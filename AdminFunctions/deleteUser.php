<?php

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

require_once('../CRUD/userCRUD.php');

if(isset($_GET['userID'])){
    $userCRUD = new userCRUD();
    $userCRUD->setUserID($_GET['userID']);
    $userCRUD->deleteUser();
    header('Location: ../Admin/viewUsers.php');
}else{
    header('Location: ../Admin/dashboard');
}

?>