<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class recipeCRUD extends dbCon
{
    private $recetaID;
    private $emriRecetes;
    private $fotoRecetes;
    private $pershkrimiRecetes;
    private $dbConn;

    public function __construct($recetaID = '', $emriRecetes = '', $fotoRecetes = '', $pershkrimiRecetes = '')
    {
        $this->recetaID = $recetaID;
        $this->emriRecetes = $emriRecetes;
        $this->fotoRecetes = $fotoRecetes;

        $this->dbConn = $this->connDB();
    }


    public function getRecetaID()
    {
        return $this->recetaID;
    }

    public function setRecetaID($recetaID)
    {
        $this->recetaID = $recetaID;
    }

    public function getEmriRecetes()
    {
        return $this->emriRecetes;
    }

    public function setEmriRecetes($emriRecetes)
    {
        $this->emriRecetes = $emriRecetes;
    }

    public function getFotoRecetes()
    {
        return $this->fotoRecetes;
    }

    public function setFotoRecetes($fotoRecetes)
    {
        $this->fotoRecetes = $fotoRecetes;
    }

    public function getPershkrimiRecetes()
    {
        return $this->pershkrimiRecetes;
    }

    public function setPershkrimiRecetes($pershkrimiRecetes)
    {
        $this->pershkrimiRecetes = $pershkrimiRecetes;
    }

    public function addRecipe()
    {
        try {
            $this->setRecetaID($_SESSION['IDRecetes']);
            $this->setEmriRecetes($_SESSION['EmriRecetes']);
            $this->setFotoRecetes($_SESSION['FotoRecetes']);
            $this->setPershkrimiRecetes($_SESSION['PershkrimiRecetes']);

            $sql = "INSERT INTO `Recetat`(`IDRecetes`,`emriRecetes`, `fotoRecetes`, `pershkrimiRecetes`) VALUES (?,?, ?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->IDRecetes, $this->emriRecetes, $this->fotoRecetes, $this->pershkrimiRecetes]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function readRecipes()
    {
        $sql = 'SELECT emriRecetes, fotoRecetes, pershkrimiRecetes FROM recetat';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $recetat =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $recetat;
    }
}
?>