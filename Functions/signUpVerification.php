<?php
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST['submitSignUp'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUserEmail($_POST['signUpEmail']);
    $checkUserEmail = $userCRUD->checkUserEmail();

    if ($checkUserEmail != null) {
        $_SESSION['signupEmailError'] = true;
        echo "<script>document.location='../Pages/signup.php'</script>";
    } else {
        $_SESSION['signupEmailError'] = false;
        $userCRUD->setUserName($_POST['signUpName']);
        $userCRUD->setUserPassword($_POST['signUpPassword']);
        $userCRUD->setUserEmail($_POST['signUpEmail']);
        $userCRUD->setUserPhone($_POST['signUpPhone']);

        $userCRUD->addUser();
        echo "<script>document.location='../Pages/login.php'</script>";
    }
}
?>