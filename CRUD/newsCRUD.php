<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class newsCRUD extends dbCon
{   
    private $newsID;
    private $newsImage;
    private $newsTitle;
    private $newsContent;
    private $newsAuthor;
    private $newsEditedOn;
    private $dbConn;

    public function __construct($newsID = '',$newsImage = '', $newsTitle = '', $newsContent = '', $newsAuthor = '', $newsEditedOn = '')
    {
        $this->newsImage = $newsImage;
        $this->newsTitle = $newsTitle;
        $this->newsContent = $newsContent;
        $this->newsAuthor = $newsAuthor;
        $this->newsEditedOn = $newsEditedOn;

        $this->dbConn = $this->connDB();
    }

    public function getNewsID()
    {
        return $this->newsID;
    }

    public function setNewsID($newsID)
    {
        $this->newsID = $newsID;
    }
    


    public function getNewsImage()
    {
        return $this->newsImage;
    }

    public function setNewsImage($newsImage)
    {
        $this->newsImage = $newsImage;
    }
    
    public function getNewsTitle()
    {
        return $this->newsTitle;
    }

    public function setNewsTitle($newsTitle)
    {
        $this->newsTitle = $newsTitle;
    }

    public function getNewsContent()
    {
        return $this->newsContent;
    }

    public function setNewsContent($newsContent)
    {
        $this->newsContent = $newsContent;
    }

    public function getNewsAuthor()
    {
        return $this->newsAuthor;
    }

    public function setNewsAuthor($newsAuthor)
    {
        $this->newsAuthor = $newsAuthor;
    }

    public function getNewsEditedOn()
    {
        return $this->newsEditedOn;
    }

    public function setNewsEditedOn($newsEditedOn)
    {
        $this->newsEditedOn = $newsEditedOn;
    }

    public function addNews(){
        try{
            $sql = "INSERT INTO `news`(`newsImage`,`newsTitle`, `newsContent`, `newsAuthor`, `newsEditedOn`) VALUES (?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->newsImage, $this->newsTitle, $this->newsContent, $this->newsAuthor, $this->newsEditedOn]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function editNews(){
        try{
            $sql = 'UPDATE news SET newsImage = ?, newsTitle = ?, newsContent = ?, newsAuthor = ?, newsEditedOn = ? WHERE newsID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->newsImage, $this->newsTitle,$this->newsContent,$this->newsAuthor, $this->newsEditedOn, $this->newsID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteNews(){
        try{
            $sql= 'DELETE FROM news WHERE newsID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->newsID]);
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkNewsInfo($newsID){
        try{
            $sql = 'SELECT * from news WHERE newsID = :newsID';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([':newsID'=>$this->newsID=$newsID]);
            $rezultati =$stm->fetch(PDO::FETCH_ASSOC);
            return $rezultati;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function readNews()
    {
        $sql = 'SELECT * FROM News ORDER BY newsEditedOn DESC';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $news =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }

    public function readLatestNews()
    {
        $sql = 'SELECT * FROM News ORDER BY newsEditedOn DESC LIMIT 3';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $latestNews =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $latestNews;
    }
}