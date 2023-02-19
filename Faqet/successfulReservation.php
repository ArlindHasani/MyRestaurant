<?php
    if (!isset($_SESSION)) {
    session_start();
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

    <section id="contact_body">
        <div class="contact-slogan" >
            <h1 class="iceberg_title">Thank You!</h1>
            <p class="iceberg_header">
                You have reserved your seat at our restaurant! 
                Get ready to enjoy world-class food made with passion and love!
            </p>
        </div>

        <div class="validForm iceberg_title"><span>Thank you for the reservation!</span></div>
    </section>

    <?php include '../Objektet/footer.php'; ?>

    <script src="../script.js"></script>
</body>
</html>