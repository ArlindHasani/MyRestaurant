<?php 

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

require_once("../CRUD/rezervimetCRUD.php");
require_once("../CRUD/userCRUD.php");
$rezervimetCRUD = new rezervimetCRUD();
$userCRUD = new userCRUD();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | DASHBOARD</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="insightSection">
            <div class="insightContainer">
                <div class="insightItem insightItem1 insightTotalUsers">
                    <?php $totalUsers = $userCRUD->countAllUsers()?>
                    <div class="insightTitleContainer">
                        <img class="userIcon" src="../Images/userIcon.png">
                        <p class="montserrat_header insightTitle">Total Users:</p>
                    </div>
                    <div class="insightValueContainer">
                        <p class="montserrat_header insightContent"><?php echo $totalUsers['all_users']?></p>
                        <a href="../Admin/viewUsers.php"><button class="button_type5 viewAllUsersBtn">View Users</button></a>
                    </div>
                </div>

                <div class="insightItem insightItem2 insightTotalReservations">
                    <?php $totalReservations = $rezervimetCRUD->countAllReservations()?>
                    <div class="insightTitleContainer">
                        <img class="userIcon" src="../Images/totalReservation.png">
                        <p class="montserrat_header insightTitle">Total Reservations:</p>
                    </div>
                    <div class="insightValueContainer">
                         <p class="montserrat_header insightContent"><?php echo $totalReservations['all_reservations']?></p>
                         <a href="../Admin/viewAllReservations.php"><button class="button_type5 viewAllReservationsBtn">View All Reservations</button></a>
                    </div>
                </div>

                <div class="insightItem insightItem3 insightActiveReservations">
                    <?php $activeReservations = $rezervimetCRUD->countActiveReservations()?>
                    <div class="insightTitleContainer">
                        <img class="userIcon" src="../Images/activeReservation.png">
                        <p class="montserrat_header insightTitle">Active Reservations:</p>
                    </div>
                    <div class="insightValueContainer">
                        <p class="montserrat_header insightContent"><?php echo $activeReservations['active_reservations']?></p>
                        <a href="../Admin/viewActiveReservations.php"><button class="button_type5 viewActiveReservationsBtn">View Active Reservations</button></a>
                    </div>
                </div>
            </div>
        </section>

        <?php include '../Objektet/footer.php'; ?>
        <script src="../script.js"></script>
    </body>
</html>