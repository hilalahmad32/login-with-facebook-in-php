<?php 

include "./fb-login.php";

session_start();
unset($_SESSION["access_token"]);
header("location:index.php");

?>