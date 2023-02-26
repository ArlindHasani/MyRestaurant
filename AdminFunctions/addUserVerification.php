<?php
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

if (isset($_POST['submitSignUp'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUserEmail($_POST['email']);
    $checkUserEmail = $userCRUD->checkUserEmail();

    if ($checkUserEmail != null) {
        $_SESSION['signupEmailError'] = true;
        echo "<script>document.location='../Admin/addUser.php'</script>";
    } else {
        $_SESSION['signupEmailError'] = false;
        $userCRUD->setUserName($_POST['name']);
        $userCRUD->setUserPassword($_POST['password']);
        $userCRUD->setUserEmail($_POST['email']);
        $userCRUD->setUserPhone($_POST['phone']);
        $userCRUD->setAcessLevel($_POST['accessLevel']);

        $userCRUD->adminAddUSer();
        echo "<script>document.location='../Admin/viewUsers.php'</script>";
    }
}
?>