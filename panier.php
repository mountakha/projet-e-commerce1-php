<!-- Le panier en lui-même où toute fonction est activée -->
<?php
session_start();
include_once("fonctions-panier.php");
include_once("paypal.php");

echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!-- th = table header(entête) 
	 tr = table row(ligne)
	 td = table data(donnée)

	 htmlspecialchars pour sécuriser le transfert de données
	 rawurlencode = encode une chaine en URL
-->



<?php include 'header.php'; ?>









<div id="user" style="background:white;width:100%;height:750px;">
   
   
   
   
    
    
    
    
    




<form method="post" action="panier.php">
<table style="width: 400px">
	<tr>
		<td colspan="4">Votre panier</td>
	</tr>
	<tr>
		<td>Libellé</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Action</td>
		
	</tr>


	<?php
	//Si la méthode creationPanier() pour créer un panier est activée
    
    
	if (creationPanier())
	{
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
		if ($nbArticles <= 0){
		echo "<tr><td>Votre panier est vide </ td></tr>";
            }
		else
		{
            $paypal = new Paypal();
             $params =  array(
             'RETURN' => 'http://localhost/clone2/process.php',
                'CANCELURL' => 'http://localhost/clone2/cancel.php'
                
                
                
            );
            
            
            
            $reponse = $paypal->request('SetExpressCheckout' , $params);
        }
            if($reponse)
            {
                
                
                $paypal ='https://sandbox.paypal.com/webscr?cmd=_ExpressCheckout&useraction=commit&token=' .$reponse['TOKEN']. '';
            }else{
                die('Erreur');
                var_dump($paypal->errors);
            }
            
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal();
			echo "</td></tr>";

			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

			echo "</td></tr>";
		}
	
	?>
	
    
    
  
	

	<?php
    
	$erreur = false;

	//if(isset($_POST['action'])){ $action = $_POST['action'] }elseif(isset($_GET['action'])){ $action = $_GET['action']} else { $action = null }}
	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
	if($action !== null)
	{
		//in_array indique si une valeur appartient à un tableau
   		if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   		$erreur=true;

	   	//récuperation des variables en POST ou GET
   		$l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   		$p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   		$q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

	   	//Suppression des espaces verticaux
   		$l = preg_replace('#\v#', '',$l);
   		//On verifie que $p soit un float
   		$p = floatval($p);

	   	//On traite $q qui peut etre un entier simple ou un tableau d'entier
    	//is_array détermine si une variable est un tableau
   		if (is_array($q)){
    		$QteArticle = array();
      		$i=0;
      		foreach ($q as $contenu){
      			//vérifie que $contenu soit un int
        		$QteArticle[$i++] = intval($contenu);
      		}
   		}
   		else
   		$q = intval($q);
    
	}

	if (!$erreur){
   		switch($action){
    		Case "ajout":
        		ajouterArticle($l,$q,$p);
        		break;

		    Case "suppression":
    	    	supprimerArticle($l);
        		break;

      		Case "refresh" :
        		for ($i = 0 ; $i < count($QteArticle) ; $i++)
         		{
            		modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
	        	}
         		break;

	      	Default:
    	    	break;
   		}
	}	
	?> 
</table>
</form>


<a href=" <?php echo $paypal; ?>"> payez la commande</a>
</div>






<?php include 'footer.php'; ?>
