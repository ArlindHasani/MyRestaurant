<?php
if (!isset($_SESSION)) {
  session_start();
}

if($_SESSION['emailError'] == true){
    $hideEmail= '';
}else{
    $hideEmail="hidden";
}

if($_SESSION['passwordError'] == true){
    $hidePassword=" ";
}else{
    $hidePassword="hidden";
}

if(isset($_SESSION['userID'])){
    header("Location: ../Pages/profile.php");
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
            <form  name="loginForm" onsubmit="return validateLogin()" action="../Functions/loginVerification.php" method="post">
                <div class="loginTitle">
                    <h4 class="montserrat_header">LOG IN</h4>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Email</label>
                    <input type="text" name="userEmail" class="" placeholder="Enter Email"/>
                    <div class="error-hint <?php echo $hideEmail ?>">Email is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Password</label>
                    <input type="password" name="userPassword" class="" placeholder="Enter Password"/>
                    <div class = "error-hint <?php echo $hidePassword ?>">Password is wrong or missing!</div>
                </div>
                <hr/>
                <p class="montserrat_small_paragraph_2 signupCta">Don't have an account ? <a href="../Pages/signup.php">Sign up<a></p>
                <button name="submitLogin" type="submit" class="button_type3 submitLogin">Log in</button>
            </form>
        </div> 
    </section>

    <?php include '../Objektet/footer.php';?>
    <script src="../script.js"></script>
</body>
</html>