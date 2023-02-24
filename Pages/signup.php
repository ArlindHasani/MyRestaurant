<?php
if (!isset($_SESSION)) {
  session_start();
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
    <title>MyRestaurant | LOGIN</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php';?>
    <section id="loginHeader">
        <h1 class="iceberg_title">JOIN US!</h1>
        <p class="iceberg_header">
            Join our family by creating an account and enjoy the benefits!
        </p>
    </section>

    <section id="login">
        <div id="form">
            <form  name="loginForm" onsubmit="return validateSignUp()" action="../Functions/signUpVerification.php" method="post">
                <div class="loginTitle">
                    <h4 class="montserrat_header">SIGN UP</h4>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Name and Surename</label>
                    <input type="text" name="signUpName" class="" placeholder="Enter your full name"/>
                    <div class="error-hint hidden">Name is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Password</label>
                    <input type="password" name="signUpPassword" class="" placeholder="Enter your password"/>
                    <div class="error-hint hidden">Password is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Email</label>
                    <input type="text" name="signUpEmail" class="" placeholder="Enter your email"/>
                    <div class="error-hint hidden">Email is wrong or missing!</div>
                    <div class="error-hint <?php echo $signupEmailError?>">Email is already being used!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Phone number</label>
                    <input type="text" name="signUpPhone" class="" placeholder="Enter your phone number"/>
                    <div class = "error-hint hidden">Phone number is wrong or missing!</div>
                <hr/>
                <button name="submitSignUp" type="submit" class="button_type3 submitSignUp">Sign up</button>
            </form>
        </div> 
    </section>
    <?php include '../Objektet/footer.php';?>
    <script src="../script.js"></script>
</body>