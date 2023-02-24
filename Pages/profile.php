<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/rezervimetCRUD.php');
$rezervimetCRUD =  new rezervimetCRUD();

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
            <h4 class="montserrat_paragraph">Here are some of the actions you can take!</h4>
            <div class="profileLinks">
                <button type="submit" class="button_type3 viewProfile">View Profile</button>
                <button type="submit" class="button_type3 viewReservations">View Reservations</button>
            </div>
            <div class="profileActions">
                <div class="viewProfileContainer hidden">
                    <div class="viewProfileContent">
                        <h5 class="montserrat_paragraph">Name: <span class="montserrat_paragraph"><?php echo $_SESSION['userName']?></span></h5>
                        <h5 class="montserrat_paragraph">Password: <span class="montserrat_paragraph"><?php echo $_SESSION['userPassword']?></span></h5>
                        <h5 class="montserrat_paragraph">Email: <span class="montserrat_paragraph"><?php echo $_SESSION['userEmail']?></span></h5>
                        <h5 class="montserrat_paragraph">Phone Number: <span class="montserrat_paragraph"><?php echo $_SESSION['userPhone']?></span></h5>
                    </div>
                    <div class="viewProfileAction">
                        <a href="../UserActions/editProfile.php?userID=<?php echo $_SESSION['userID']?>"><button name="editProfile" type="submit" class="button_type3 editProfileBtn">Edit Profile</button></a>
                    </div>
                </div>
                <div class="viewReservationsContainer hidden">
                    <h5 class="montserrat_paragraph">Your Reservations: </h5>
                    <div class="viewReservationsContent">
                        <?php $rezervimet = $rezervimetCRUD->lexoRezervimetUser(); ?>
                        <table>
                            <tr class="montserrat_small_paragraph_2">
                                <th>Emri Rezervues</th>
                                <th>Numri Personave</th>
                                <th>Email Rezervues</th>
                                <th>Numri Rezervues</th>
                                <th>Data Rezervuar</th>
                                <th>Mesazhi</th>
                            </tr>
                            <tr class="montserrat_small_paragraph">
                                <td>Row 1, Column 1</td>
                                <td>Row 1, Column 2</td>
                                <td>Row 1, Column 3</td>
                                <td>Row 1, Column 4</td>
                                <td>Row 1, Column 5</td>
                                <td>Row 1, Column 6</td>
                            </tr>
                            <tr class="montserrat_small_paragraph">
                                <td>Row 1, Column 1</td>
                                <td>Row 1, Column 2</td>
                                <td>Row 1, Column 3</td>
                                <td>Row 1, Column 4</td>
                                <td>Row 1, Column 5</td>
                                <td>Row 1, Column 6</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section> 

        <?php include '../Objektet/footer.php'; ?>
        <script src="../script.js"></script>
    </body>
</html>