<?php

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}


require_once('../CRUD/userCRUD.php');
$userCRUD =  new userCRUD();  

$currentUserInfo = $userCRUD->checkUserInfo($_GET['userID']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | EDIT USER</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="profile">
            <h2 class="montserrat_header">Hello, <?php echo $_SESSION['userName']?>!</h2>
            <h4 class="montserrat_paragraph">Here are some of the changes you can make to the selected profile!</h4>

    

            <div class="editProfileContainer">
                <div class="editProfileContent">
                    <div id="form">
                        <form  name="adminEditUser" onsubmit="return validateAdminEditProfile()" 
                        action= "../AdminFunctions/editUser.php?userID=<?php echo $currentUserInfo['userID']?>" method="post">
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Access Level</label>
                                <input type="text" name="editUserAccessLevel" class="" value="<?php echo $currentUserInfo['accessLevel'];?>"/>
                                <div  class="error-hint hidden">Access Level is wrong or empty</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Password</label>
                                <input type="text" name="editUserPassword" class="" value="<?php echo $currentUserInfo['userPassword'];?>"/>
                                <div  class="error-hint hidden">Password is wrong or empty!</div>
                            </div>
                            <hr/>
                            <div class="editProfileActions">
                                <button name="saveUserProfileEdit" type="submit" class="button_type3 saveUserProfileEdit">Save</button>
                                <button onclick="cancelAdminlUserProfileEdit()" type="submit" class="button_type3 cancelAdminlUserProfileEdit">Cancel</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </section>

        <?php include '../Objektet/footer.php'; ?>
        <script src="../script.js"></script>
    </body>
</html>