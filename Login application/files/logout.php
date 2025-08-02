<?php 
//starting the session
session_start(); 

?>

<?php 
//unsetting the session created
session_unset(); 

?>

<?php 
//destroying the session
session_destroy(); 

?>

<?php 
//back to main page after logout
header('location:../index.php'); 

?>