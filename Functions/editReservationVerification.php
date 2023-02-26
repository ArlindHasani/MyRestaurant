<?php 
require('../CRUD/rezervimetCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_GET['reservationID'])){
    updateReservationInformation();
}

function updateReservationInformation(){
    $rezervimetCRUD = new rezervimetCRUD();
    $rezervimetCRUD->setReservationID($_GET['reservationID']);
    $reservationInformaion = $rezervimetCRUD->readReservationsByID($_GET['reservationID']);

    $rezervimetCRUD->setEmriRezervues($_POST['editEmriRezervues']);
    $rezervimetCRUD->setNumriPersonave($_POST['editNumriPersonave']);
    $rezervimetCRUD->setNumriRezervues($_POST['editNumriRezervues']);
    $rezervimetCRUD->setDataRezervuar($_POST['editDataRezervuar']);
    $rezervimetCRUD->setMesazhi($_POST['editMesazhi']);

    $rezervimetCRUD->updateReservationInfo();
    header ("Location: ../Pages/profile.php");
}
?>