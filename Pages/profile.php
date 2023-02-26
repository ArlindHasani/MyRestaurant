<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/rezervimetCRUD.php');
$rezervimetCRUD =  new rezervimetCRUD();

if(!isset($_SESSION['userID'])){
    header("Location: ../Pages/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | PROFILE</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="profile">
            <h2 class="montserrat_header">Hello, <?php echo $_SESSION['userName']?>!</h2>
            <h4 class="montserrat_paragraph">Here are some of the actions you can take!</h4>
            <div class="profileLinks">
                <button type="submit" class="button_type3 viewProfile">View Profile</button>
                <button type="submit" class="button_type3 viewReservations">View Reservations</button>
                <button type="submit" class="button_type3 logout">Log out</button>
            </div>
            <div class="profileActions">
                <div class="viewProfileContainer hidden">
                    <div class="viewProfileContent">
                        <h5 class="montserrat_paragraph">Name: <br> <span class="montserrat_paragraph"><?php echo $_SESSION['userName']?></span></h5>
                        <h5 class="montserrat_paragraph">Password: <br><span class="montserrat_paragraph"><?php echo $_SESSION['userPassword']?></span></h5>
                        <h5 class="montserrat_paragraph">Email:<br> <span class="montserrat_paragraph"><?php echo $_SESSION['userEmail']?></span></h5>
                        <h5 class="montserrat_paragraph">Phone Number:<br> <span class="montserrat_paragraph"><?php echo $_SESSION['userPhone']?></span></h5>
                    </div>
                    <div class="viewProfileAction">
                        <a href="../UserActions/editProfile.php?userID=<?php echo $_SESSION['userID']?>"><button name="editProfile" type="submit" class="button_type3 editProfileBtn">Edit Profile</button></a>
                    </div>
                </div>
                <div class="viewReservationsContainer hidden">
                    <?php $rezervimet = $rezervimetCRUD->readReservationsByEmail ($_SESSION['userEmail']); ?>
                    <h5 class="montserrat_paragraph">Your Reservations: </h5>
                    <div class="viewReservationsContent">   
                        <table>
                            <thead>
                                <tr class="montserrat_small_paragraph_2 tableheader">
                                <th>Emri Rezervues</th>
                                <th>Numri Personave</th>
                                <th>Email Rezervues</th>
                                <th>Numri Rezervues</th>
                                <th>Data Rezervuar</th>
                                <th>Mesazhi</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <?php foreach($rezervimet as $rezervimi){?>
                            <tbody>
                                <tr class="montserrat_small_paragraph tablerow">
                                    <td data-label="Emri Rezervues"><?php echo $rezervimi['emriRezervues']?></td>
                                    <td data-label="Numri Personave"><?php echo $rezervimi['numriPersonave']?></td>
                                    <td data-label="Email Rezervues"><?php echo $rezervimi['emailRezervues']?></td>
                                    <td data-label="Numri Rezervues"><?php echo $rezervimi['numriRezervues']?></td>
                                    <td data-label="Data Rezervuar"><?php echo $rezervimi['dataRezervuar']?></td>
                                    <td data-label="Mesazhi"><?php echo $rezervimi['mesazhi']?></td>
                                    <td data-label="Actions" class="reservationActions">
                                        <a href="../Functions/cancelReservation.php?reservationID=<?php echo $rezervimi['reservationID']?>">
                                            <button onsubmittype="submit" class="button_type4 cancelReservation">Cancel</button>
                                        </a>
                                        <a href="../UserActions/editReservation.php?reservationID=<?php echo $rezervimi['reservationID']?>">
                                            <button type="submit" class="button_type4 editReservation">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </section> 

        <?php include '../Objektet/footer.php'; ?>
        <script src="../script.js"></script>
    </body>
</html>