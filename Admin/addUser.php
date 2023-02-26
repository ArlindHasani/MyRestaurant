<?php
if (!isset($_SESSION)) {
  session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

if($_SESSION['signupEmailError'] == true){
    $signupEmailError= '';
}else{
    $signupEmailError="hidden";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>MyRestaurant | ADD USER</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php';?>
    <section id="addUser">
        <div id="form">
            <form  name="loginForm" onsubmit="return validateAddUser()" action="../AdminFunctions/addUserVerification.php" method="post">
                <div class="loginTitle">
                    <h4 class="montserrat_header">ADD USER</h4>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Name and Surename</label>
                    <input type="text" name="name" class="" placeholder="Enter full name"/>
                    <div class="error-hint hidden">Name is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Password</label>
                    <input type="password" name="password" class="" placeholder="Enter password"/>
                    <div class="error-hint hidden">Password is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Email</label>
                    <input type="text" name="email" class="" placeholder="Enter email"/>
                    <div class="error-hint hidden">Email is wrong or missing!</div>
                    <div class="error-hint <?php echo $signupEmailError?>">Email is already being used!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Phone number</label>
                    <input type="text" name="phone" class="" placeholder="Enter phone number"/>
                    <div class = "error-hint hidden">Phone number is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Access Level</label>
                    <input type="text" name="accessLevel" class="" placeholder="Enter the access level"/>
                    <div class = "error-hint hidden">Access Level is wrong or missing!</div>
                </div>
                <hr/>
                <div class="adminAddUserActions">
                    <button type="submit" class="button_type3 addUser">Add User</button>
                    <button onclick="cancelAddUser()"type="submit" class="button_type3 cancelAddUser">Cancel</button>
                </div>
            </form>
        </div> 
    </section>
    <?php include '../Objektet/footer.php';?>
    <script src="../script.js"></script>
</body>
</html>