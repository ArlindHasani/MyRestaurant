<?php

if (!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['userID'])){
    header("Location: ../Pages/login.php");
}
  
require_once('../CRUD/rezervimetCRUD.php');
$rezervimetCRUD =  new rezervimetCRUD();  

$currentReservationInfo = $rezervimetCRUD->readReservationsByID($_GET['reservationID']);

if($currentReservationInfo['emailRezervues'] != $_SESSION['userEmail']){
    header("Location: ../Pages/profile.php");
}

var_dump($currentReservationInfo['emriRezervues']);
print_r($currentReservationInfo);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | EDIT RESERVATION</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="profile">
            <h2 class="montserrat_header">Hello, <?php echo $_SESSION['userName']?>!</h2>
            <h4 class="montserrat_paragraph">Here are some of the changes you can make to your selected reservation!</h4>
        
            <div class="editProfileContainer">
                <div class="editProfileContent">
                    <div id="form">
                        <form  name="editReservation" onsubmit="return validateEditReservation()" 
                        action= "../Functions/editReservationVerification.php?reservationID=<?php echo $_GET['reservationID']?>" method="post">
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Name and Surename</label>
                                <input type="text" name="editEmriRezervues" class="" value="<?php echo $currentReservationInfo["emriRezervues"];?>"/>
                                <div  class="error-hint hidden">Name and Surename field is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Number of guests</label>
                                <input type="text" name="editNumriPersonave" class="" value="<?php echo $currentReservationInfo['numriPersonave'];?>"/>
                                <div  class="error-hint hidden">Number of guests is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Contact Phone</label>
                                <input type="text" name="editNumriRezervues" class="" value="0<?php echo $currentReservationInfo['numriRezervues'];?>"/>
                                <div  class="error-hint hidden">Contact Phone is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Reserved Date</label>
                                <input type="text" name="editDataRezervuar"  value="<?php echo $currentReservationInfo['dataRezervuar'];?>"/>
                                <div  class="error-hint hidden">Reserved Date is wrong or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Message</label>
                                <input type="text" name="editMesazhi"  value="<?php echo $currentReservationInfo['mesazhi'];?>"/>
                                <div  class="error-hint hidden"></div>
                            </div>
                            <hr/>
                            <div class="editProfileActions">
                                <button name="saveReservationEdit" type="submit" class="button_type3 saveReservationEdit">Save</button>
                                <button onclick="cancelReservationEdit()" type="submit" class="button_type3 cancelReservationEdit">Cancel</button>
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