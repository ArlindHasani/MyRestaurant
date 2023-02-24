<?php
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitLogin'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUserEmail($_POST['userEmail']);
    $checkUserEmail = $userCRUD->checkUserEmail();


    if ($checkUserEmail != null) {
        $userCRUD->setUserPassword($_POST['userPassword']);
        $checkPassword = $userCRUD->checkPassword();
        $_SESSION['emailError'] = false;

        if ($checkPassword != null) {
            $_SESSION['passwordError'] = false;

            $_SESSION['userID'] = $checkPassword ['userID'];
            $_SESSION['userName'] = $checkPassword['userName'];
            $_SESSION['userPassword'] = $checkPassword['userPassword'];
            $_SESSION['userEmail'] = $checkPassword['userEmail'];
            $_SESSION['userPhone'] = $checkPassword['userPhone'];
            $_SESSION['accessLevel'] = $checkPassword['accessLevel'];
            $_SESSION['loggedIn'] = true;    
            header("Location: ../Pages/profile.php");
        } else {
            $_SESSION['passwordError'] = true;
            $_SESSION['emailError'] = false;
            echo "<script>document.location='../Pages/login.php'</script>";
        }
    } else {
        $_SESSION['emailError'] = true;
        echo "<script>document.location='../Pages/login.php'</script>";
    }
}
?>