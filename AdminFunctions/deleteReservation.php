<?php

    require_once('../CRUD/rezervimetCRUD.php');

    if(isset($_GET['reservationID'])){
        $reservation = new rezervimetCRUD();
        $reservation->setReservationID($_GET['reservationID']);
        $reservation-> cancelReservation();
        header('Location: ../Admin/Dashboard.php');
    }else{
        header('Location: ../Admin/Dashboard.php');
    }

?>