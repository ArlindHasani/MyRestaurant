<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class rezervimetCRUD extends dbCon
{   
    private $reservationID;
    private $emriRezervues;
    private $numriPersonave;
    private $emailRezervues;
    private $numriRezervues;
    private $dataRezervuar;
    private $mesazhi;
    private $dbConn;

    public function __construct($reservationID = '',$emriRezervues = '', $numriPersonave = '', $emailRezervues = '', $numriRezervues = '', $dataRezervuar = '', $mesazhi = '')
    {
        $this->reservationID = $reservationID;
        $this->emriRezervues = $emriRezervues;
        $this->numriPersonave = $numriPersonave;
        $this->emailRezervues = $emailRezervues;
        $this->numriRezervues = $numriRezervues;
        $this->dataRezervuar = $dataRezervuar;
        $this->mesazhi = $mesazhi;

        $this->dbConn = $this->connDB();
    }

    public function getReservationID()
    {
        return $this->reservationID;
    }

    public function setReservationID($reservationID)
    {
        $this->reservationID = $reservationID;
    }

    public function getEmriRezervues()
    {
        return $this->emriRezervues;
    }

    public function setEmriRezervues($emriRezervues)
    {
        $this->emriRezervues = $emriRezervues;
    }
    
    public function getNumriPersonave()
    {
        return $this->numriPersonave;
    }

    public function setNumriPersonave($numriPersonave)
    {
        $this->numriPersonave = $numriPersonave;
    }

    public function getEmailRezervues()
    {
        return $this->emailRezervues;
    }

    public function setEmailRezervues($emailRezervues)
    {
        $this->emailRezervues = $emailRezervues;
    }

    public function getNumriRezervues()
    {
        return $this->numriRezervues;
    }

    public function setNumriRezervues($numriRezervues)
    {
        $this->numriRezervues = $numriRezervues;
    }

    public function getDataRezervuar()
    {
        return $this->dataRezervuar;
    }

    public function setDataRezervuar($dataRezervuar)
    {
        $this->dataRezervuar = $dataRezervuar;
    }

    public function getMesazhi()
    {
        return $this->mesazhi;
    }

    public function setMesazhi($mesazhi)
    {
        $this->mesazhi = $mesazhi;
    }

    public function addReservation()
    {
        try{
            $sql = "INSERT INTO `Rezervimet`(`emriRezervues`,`numriPersonave`, `emailRezervues`, `numriRezervues`, `dataRezervuar`, `mesazhi`) VALUES (?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriRezervues, $this->numriPersonave, $this->emailRezervues, $this->numriRezervues, $this->dataRezervuar, $this->mesazhi]);
        }catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function readReservationsByEmail($emailRezervues)
    {   
        try{
            $sql = 'SELECT * FROM rezervimet WHERE emailRezervues = :emailRezervues';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([':emailRezervues'=>$this->emailRezervues=$emailRezervues]);
            $rezervimet =$stm->fetchAll(PDO::FETCH_ASSOC);
            return $rezervimet;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function readReservationsByID($reservationID)
    {
        try{
            $sql = 'SELECT * FROM rezervimet WHERE reservationID = :reservationID';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([':reservationID'=>$this->reservationID=$reservationID]);
            $rezervimi =$stm->fetch(PDO::FETCH_ASSOC);
            return $rezervimi;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function readAllReservations(){
        $sql = 'SELECT * FROM rezervimet ORDER BY dataRezervuar DESC';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $rezervimet =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $rezervimet;
    }

    public function readActiveReservations(){
        try{
            $current_date = date('Y-m-d');
            $sql = "SELECT * FROM rezervimet WHERE  dataRezervuar > '$current_date'";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $rezervimi =$stm->fetchAll(PDO::FETCH_ASSOC);
            return $rezervimi;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function cancelReservation(){
        try{
            $sql= 'DELETE FROM rezervimet WHERE reservationID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->reservationID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateReservationInfo()
    {
        try{
            $sql = 'UPDATE rezervimet SET emriRezervues = ?, numriPersonave = ?, numriRezervues = ?, dataRezervuar = ?, mesazhi = ? WHERE reservationID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriRezervues, $this->numriPersonave,$this->numriRezervues,$this->dataRezervuar, $this->mesazhi, $this->reservationID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function countAllReservations()
    {
        try{
            $sql = 'SELECT COUNT(*) AS all_reservations FROM rezervimet';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $allReservations =$stm->fetch(PDO::FETCH_ASSOC);
            return $allReservations;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function countActiveReservations()
    {
        try{
            $current_date = date('Y-m-d');
            $sql = "SELECT COUNT(*) AS active_reservations FROM rezervimet WHERE dataRezervuar > '$current_date'";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $activeReservations =$stm->fetch(PDO::FETCH_ASSOC);
            return $activeReservations;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
}
