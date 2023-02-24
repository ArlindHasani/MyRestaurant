<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class rezervimetCRUD extends dbCon
{
    private $emriRezervues;
    private $numriPersonave;
    private $emailRezervues;
    private $numriRezervues;
    private $dataRezervuar;
    private $mesazhi;
    private $dbConn;

    public function __construct($emriRezervues = '', $numriPersonave = '', $emailRezervues = '', $numriRezervues = '', $dataRezervuar = '', $mesazhi = '')
    {
        $this->emriRezervues = $emriRezervues;
        $this->numriPersonave = $numriPersonave;
        $this->emailRezervues = $emailRezervues;
        $this->numriRezervues = $numriRezervues;
        $this->dataRezervuar = $dataRezervuar;
        $this->mesazhi = $mesazhi;

        $this->dbConn = $this->connDB();
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

    public function shtoRezervimin()
    {
        try{
            $sql = "INSERT INTO `Rezervimet`(`emriRezervues`,`numriPersonave`, `emailRezervues`, `numriRezervues`, `dataRezervuar`, `mesazhi`) VALUES (?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriRezervues, $this->numriPersonave, $this->emailRezervues, $this->numriRezervues, $this->dataRezervuar, $this->mesazhi]);
        }catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function lexoRezervimet()
    {
        $sql = 'SELECT * FROM rezervimet';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $rezervimet =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $rezervimet;
    }

    public function lexoRezervimetUser()
    {
        
    }

}
