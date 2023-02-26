<?php 
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_GET['userID'])){
    updateUserInformation();
}

function updateUserInformation(){
    $userCRUD = new userCRUD();
    $userCRUD->setUserID($_GET['userID']);
    $userInformation = $userCRUD->checkUserInfo($_GET['userID']);

    $userCRUD->setUserName($_POST['editUserName']);
    $userCRUD->setUserPassword($_POST['editUserPassword']);
    $userCRUD->setUserEmail($_POST['editUserEmail']);
    $userCRUD->setUserPhone($_POST['editUserPhone']);

    $_SESSION['userName'] = $userCRUD->getUserName();
    $_SESSION['userPassword'] = $userCRUD->getUserPassword();
    $_SESSION['userEmail'] = $userCRUD->getUserEmail();
    $_SESSION['userPhone'] = $userCRUD->getUserPhone();

    $userCRUD->updateUserInfo();
    header ("Location: ../Pages/profile.php");
}
?>