

<?php

require 'connexion.php' ;
session_start();






if(isset($_SESSION['id']))
{




}





if(isset($_SESSION['pseudo']))
{

    $requser = $bdd->prepare('SELECT * FROM inscription2 WHERE id = ?');

    $userexist =  $requser->fetch();


}else{
    header('location:index.php');
}



if(isset($_GET['id']) AND $_GET['id'] > 0)
{

    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM inscription2 WHERE id = ?');
    $requser->execute(array($getid));
    $userexist =  $requser->fetch();



}

else{
    header('location:resgister.php');
}

?>



<?php include 'header.php'; ?>









<div id="user" style="background:white;width:100%;height:750px;">
    <div class="con" style=" background:#34495e;width:20%;height:200px;margin-left:70px;margin-top:50px;border:5px solid;border-radius:50px 50px 550px 50px;" ><img src="css1/image2/iconne%20(1).png" alt="" style="margin-top:-20px;margin-left:15px;">
    
    
    
    
    </div>
    
    
    <div class="cin" style="background:#34495e;width:70%;height:550px;margin-left:400px;margin-top:-200px;border:2px solid;border-radius:15px;">
    
    <div class="cont" style="background:#c0392b;width:90%;height:500px;margin-left:50px;margin-top:20px;border:2px solid;border-radius:15px;">
        
        
        
        
        <div class="P" style="background:#f39c12;width:70%;height:100px;margin-left:150px;margin-top:10px;border:2px solid;border-radius:15px;">
        <?php echo $userexist['pseudo'] ;?>

<?php echo $userexist['email'] ;   ?></div>
    </div>
    </div>
    
    
    
    <div id="tableau" >
			<ul style="background:#c0392b;width:25%;margin-top:-250px;margin-left:15px;list-style:none;display:block;list-style-type:none;border:5px solid;border-radius:15px;">
				<li ><a href="page2.php?id=<?php echo $_SESSION['id']?>" >Achat</a></li>
				
				<li><a href="admin.php">Vente</a></li>
				<li><a href="edition.php">Edition</a></li>
				<li><a href="deconnexion.php">Deconnexion</a></li>
				
			</ul>
		</div>
		
    

</div>


 
















<?php include 'footer.php'; ?>
