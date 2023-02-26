<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if($_SESSION['accessLevel'] != 'admin'){
        header("Location: ../Pages/index.php");
    }

    require_once('../CRUD/rezervimetCRUD.php');
    $rezervimetCRUD =  new rezervimetCRUD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRestaurant | VIEW RESERVATIONS</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php'; ?>

    <section id="viewUser">
        <div class="viewUserContainer">
            <?php $rezervimet = $rezervimetCRUD->readActiveReservations(); ?>
            <h5 class="montserrat_paragraph">All Reservations: </h5>
            <div class="viewUsersContent">   
                <table>
                    <thead>
                        <tr class="montserrat_small_paragraph_2 tableheader">
                        <th>ReservationID</th>
                        <th>Name and Surename</th>
                        <th>Number of Guests</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Reservation Date</th>
                        <th>Message</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <?php foreach($rezervimet as $rezervimi){?>
                    <tbody>
                        <tr class="montserrat_small_paragraph tablerow">
                            <td data-label="ReservationID"><?php echo $rezervimi['reservationID']?></td>
                            <td data-label="Name and Surename"><?php echo $rezervimi['emriRezervues']?></td>
                            <td data-label="No. Guests"><?php echo $rezervimi['numriPersonave']?></td>
                            <td data-label="Email"><?php echo $rezervimi['emailRezervues']?></td>
                            <td data-label="Phone"><?php echo $rezervimi['numriRezervues']?></td>
                            <td data-label="Reservation Date"><?php echo $rezervimi['dataRezervuar']?></td>
                            <td data-label="Message"><?php echo $rezervimi['mesazhi']?></td>
                            <td data-label="Actions" class="viewUsersActions">
                                <a href="../AdminFunctions/deleteReservation.php?reservationID=<?php echo $rezervimi['reservationID']?>">
                                    <button type="submit" class="button_type4 cancelReservation">Cancel</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <?php }?>
                </table>
            </div>
        </div>
    </section>

    <?php include '../Objektet/footer.php'; ?>
    <script src="../script.js"></script>
</body>
</html>