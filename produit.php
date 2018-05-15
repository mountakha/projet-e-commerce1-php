<?php

require 'connexion.php' ;
session_start();

  

if(isset($_SESSION['id']))
{
    




}

else{
    header('location:utilisateur.php');
}
?>



<?php include 'header.php'; ?>
 
 
 
 
 <div id="wrap" style="width:100%;height:800px;">
 
    <div id="product_layout_1">
      <div class="top">
      <div class="product_images">
        <div class="product_image_1">
          <img src="css1/image2/banne1%20(1).jpeg"/>
        </div>
        <div class="product_image_small">
          <div class="product_image_2">
            <img src="css1/image2/banne1%20(2).jpeg"/>
          </div>
                    <div class="product_image_3">
            <img src="css1/image2/banane3.jpeg"/>
          </div>
                    <div class="product_image_4">
            <img src="css1/image2/banane4.jpg"/>
          </div>
          
        </div>
        <a href="stripe.php" class="btn btn-primary btn-block btn-flat" style="margin-top:100px;" >Acheter</a>
        </div>
        <div class="product_info">
          <h1>Produit</h1>
          <div class="price">
          <h2 class="original_price"></h2>
          
          </div>
          </br>
              
              </br>
              </br>
          <div class="product_description">
          
          
                    <?php
              
              

$requete = $bdd->query("SELECT * FROM products WHERE id = 3");
                   
$donne = $requete->fetch();   
              echo $donne['name_product'] ;  
              
              
              ?>
      
          <p>Oh yes sir. Well, they're your parents, you must know them. What are their common interests, what do they like to do together? You're George McFly. Nothing, nothing, nothing, look tell her destiny has brought you together, tell her that she's the most beautiful you have ever seen. Girls like that stuff. What, what are you doing George? Lorraine, are you up there?</p>
          <p>My insurance, it's your car, your insurance should pay for it. Hey, I wanna know who's gonna pay for this? I spilled beer all over it when that car smashed into me. Who's gonna pay my cleaning bill? Radiation suit, of course, cause all of the fall out from the atomic wars. This is truly amazing, a portable television studio. No wonder your president has to be an actor, he's gotta look good on television. C'mon, he's not that bad. At least he's letting you borrow the car tomorrow night. Ohh, no. What do you mean you've seen this, it's brand new.</p>
          </div>
         
          </div>
        </div>
          </div>
          </div>
      
     
    
   
  <?php include 'footer.php'; ?>
