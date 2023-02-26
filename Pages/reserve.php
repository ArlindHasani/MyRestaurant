<?php
    if (!isset($_SESSION)) {
    session_start();
    }

    require_once('../CRUD/rezervimetCRUD.php');

    if(isset($_POST['submitReservation'])){
        $rezervimetCRUD= new rezervimetCRUD();

        $rezervimetCRUD->setEmriRezervues($_POST['emri']);
        $rezervimetCRUD->setNumriPersonave($_POST['guests']);
        $rezervimetCRUD->setEmailRezervues($_POST['Email']);
        $rezervimetCRUD->setNumriRezervues($_POST['phone']);
        $rezervimetCRUD->setDataRezervuar($_POST['date']);
        $rezervimetCRUD->setMesazhi($_POST['message']);

        $rezervimetCRUD->addReservation();
        header("Location: ../Pages/successfulReservation.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>MyRestaurant | RESERVE</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php'; ?>

    <section id="contact_body">
        <div class="contact-slogan" >
            <h1 class="iceberg_title">Reserve with Us!</h1>
            <p class="iceberg_header">
                Reserve your seat at our restaurant! 
                Enjoy world-class food made with passion and love!
            </p>
        </div>
        <div id="form">
            <form  name="reservationForm" onsubmit="return validateReservations()" action="" method="post">
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Name and Surname</label>
                    <input type="text" name="emri" class="" placeholder="Name and surname "/>
                    <div  class="error-hint hidden">Name and surname is missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Number of Guests</label>
                    <input type="text" name="guests" class="" placeholder="Number of Guests "/>
                    <div  class="error-hint hidden">Number of guest is missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Email</label>
                    <input type="text" name="Email" class="" placeholder="Email "/>
                    <div  class="error-hint hidden">Email is wrong or missing!</div>
                </div> 
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Phone number</label>
                    <input type="text" name="phone"  placeholder="Phone number "/>
                    <div  class="error-hint hidden">Phone number is wrong or missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Date</label>
                    <input type="text" name="date"  placeholder="Date: YYYY/MM/DD"/>
                    <div  class="error-hint hidden">Date is missing!</div>
                </div>
                <div class="form-group">
                    <label class="montserrat_small_paragraph_2">Message</label>
                    <input type="text" name="message" class="textarea" placeholder="Put your message here "/>
                    <div class="error-hint hidden">You must input a message!</div>
                </div> 


                <hr/>
                <button name="submitReservation" type="submit" class="button_type3 submitReservationBtn">Submit</button>
            </form>
        </div> 

        <div class="validForm hidden iceberg_title"><span>Faleminderit per rezervimin!</span></div>
    </section>

    <?php include '../Objektet/footer.php'; ?>

    <script src="../script.js"></script>
</body>
</html>