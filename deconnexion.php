<?php 
session_start();
require'config.php';
$_SESSION = array ();
session_destroy();
header("location: sign up.php");

?>