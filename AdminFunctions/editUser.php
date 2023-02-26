<?php 
require('../CRUD/userCRUD.php');

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}


if (!isset($_SESSION)) {
    session_start();
}

if(isset($_GET['userID'])){
    updateUserInformation();
}

function updateUserInformation(){
    $userCRUD = new userCRUD();
    $userCRUD->setUserID($_GET['userID']);
    
    $userCRUD->setUserPassword($_POST['editUserPassword']);
    $userCRUD->setAcessLevel($_POST['editUserAccessLevel']);

    $userCRUD->updateUserInfoAdmin();
    header ("Location: ../Admin/dashboard.php");
}
?>