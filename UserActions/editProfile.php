<?php

if (!isset($_SESSION)) {
    session_start();
}
  
require_once('../CRUD/userCRUD.php');
$userCRUD =  new userCRUD();  
$userID = $_GET['userID'];

$currentUserInfo = $userCRUD->checkUserInfo($userID);

$saveEdit = "";

if(isset($_POST['cancelUserProfileEdit'])){
    echo "<script>document.location='../Pages/profile.php'</script>";
}

if($_SESSION['editProfileEmailError'] == true){
    $editProfileEmailError= '';
}else{
    $editProfileEmailError="hidden";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="profile">
            <h2 class="montserrat_header">Hello, <?php echo $_SESSION['userName']?>!</h2>
            <h4 class="montserrat_paragraph">Here are some of the changes you can make to your profile!</h4>
        
            <div class="editProfileContainer">
                <div class="editProfileContent">
                    <div id="form">
                        <form  name="editProfile" onsubmit="return validateEditProfile()" 
                        action= "../Functions/editProfileVerification.php?userID=<?php echo $_SESSION['userID']?>" method="post">
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Name and Surname</label>
                                <input type="text" name="editUserName" class="" value="<?php echo $currentUserInfo['userName'];?>"/>
                                <div  class="error-hint hidden">Name and surname is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Password</label>
                                <input type="text" name="editUserPassword" class="" value="<?php echo $currentUserInfo['userPassword'];?>"/>
                                <div  class="error-hint hidden">Password is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Email</label>
                                <input type="text" name="editUserEmail" class="" value="<?php echo $currentUserInfo['userEmail'];?>"/>
                                <div  class="error-hint hidden">Email is wrong or empty!</div>
                                <div  class="error-hint <?php echo $editProfileEmailError?>">Email already in use!</div>
                            </div> 
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Phone number</label>
                                <input type="text" name="editUserPhone"  value="<?php echo $currentUserInfo['userPhone'];?>"/>
                                <div  class="error-hint hidden">Phone number is wrong or empty!</div>
                            </div>
                            <hr/>
                            <div class="editProfileActions">
                                <button name="saveUserProfileEdit" type="submit" class="button_type3 saveUserProfileEdit">Save</button>
                                <button name="cancelUserProfileEdit" type="submit" class="button_type3 cancelUserProfileEdit">Cancel</button>
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