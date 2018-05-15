

<?php

// On active les sessions :


session_start();
$_SESSION = array();
session_destroy();
header("location: resgister.php");

?>
