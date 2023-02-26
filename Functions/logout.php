<?php 

if (!isset($_SESSION)) {
    session_start();
}

session_destroy();
$_SESSION = array();
header("Location: ../Pages/login.php");

?>