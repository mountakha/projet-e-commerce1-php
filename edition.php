<?php

require 'connexion.php' ;
session_start();


if(isset($_SESSION['id']))
{
   $requser = $bdd->prepare("SELECT * FROM inscription2 WHERE id = ?");
   $requser->execute(array($_SESSION['id'])) ;
    $user = $requser->fetch();
    
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])AND $_POST['newpseudo'] != $user['pseudo'] )
    
    {
    $newpseudo = htmlspecialchars($_POST['newpseudo']);
    $insertpseudo = $bdd->prepare('UPDATE inscription2 SET pseudo = ? WHERE id = ? ');
    
    $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('location . utilisateur.php?id='.$_SESSION['id']);
        
    
    }

    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail']  != $user['email']){
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare('UPDATE inscription2 SET email = ?  WHERE ');

        $insertmail->execute(array($newmail, $_SESSION['id'] ));
        header('location . utilisateur.php?id='.$_SESSION['id']);


    }
    if(isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND isset($_POST['newpassword2']) AND !empty($_POST['newpassword2'])){


        $newpassword = sha1($_POST['newpassword']);
        $newpassword2 =sha1($_POST['newpassword2']);
        
        
        if($newpassword ==  $newpassword2 )
        {
            $insertmtp = $bdd->prepare("UPDATE inscription2 SET password = ? WHERE id = ? ");
            $insertmtp->execute(array($newpassword, $_SESSION['id']));
             header('location . utilisateur.php?id='.$_SESSION['id']);
        }
        
        
        
        


    }



    else{

        $erreur= "Vos deux mots de passe ne corresponde pas !";
    }
        
        
      

}

 else{

        $erreur= "Vos deux mots de passe ne corresponde pas !";
    }
        





?>








<?php include 'header.php'; ?>








<div id="Love" style="background:white;width:100%;height:750px;">



  <div class="register-box-body">
        <p class="login-box-msg" style="margin-left:500px;margin-top:10px;">Edition de Profile</p>

        <form action="" method="POST" enctype="multipart/form-data" style="width:30%;height:100px;margin-left:500px;margin-top:100px;">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="pseudo"  id="newpseudo" name="newpseudo" value="<?php  echo $user['pseudo'];     ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="editer son email"  id="newmail" name="newmail"   value="<?php  echo $user['email'];     ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="edite du mot de passe "  id="newpassword" name="newpassword" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="confirmation"  id="newpassword2" name="newpassword2" value="">

                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            
            
            
            <div class="row">
                
                <!-- /.col -->
                <div class="col-xs-4" style="margin-left:250px;">
                    <button type="submit" name="inscription" class="btn btn-primary btn-block btn-flat">Valider</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
 <?php  if(isset($msg)){ echo   '<font color="red" >'.$msg.'</font>' ; } ?>

      
    </div>





</div>



<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>







<?php include 'footer.php'; ?>
