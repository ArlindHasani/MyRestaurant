<?php
require_once('../Databaza/db.php');

if (!isset($_SESSION)) {
    session_start();
}

class newsCRUD extends dbCon
{
    private $newsImage;
    private $newsTitle;
    private $newsContent;
    private $newsAuthor;
    private $newsEditedOn;
    private $dbConn;

    public function __construct($newsImage = '', $newsTitle = '', $newsContent = '', $newsAuthor = '', $newsEditedOn = '')
    {
        $this->newsImage = $newsImage;
        $this->newsTitle = $newsTitle;
        $this->newsContent = $newsContent;
        $this->newsAuthor = $newsAuthor;
        $this->newsEditedOn = $newsEditedOn;

        $this->dbConn = $this->connDB();
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

    public function addNews()
    {
        try{
            $sql = "INSERT INTO `News`(`newsImage`,`newsTitle`, `newsContent`, `newsAuthor`, `newsEditedOn`) VALUES (?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->newsImage, $this->newsTitle, $this->newsContent, $this->newsAuthor, $this->newsEditedOn]);
        }catch (Exception $e) {
            return $e->getMessage();
        }

    }
    public function readNews()
    {
        $sql = 'SELECT * FROM News';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $news =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }

    public function readLatestNews()
    {
        $sql = 'SELECT * FROM News ORDER BY newsEditedOn LIMIT 3';
        $stm = $this->dbConn->prepare($sql);
        $stm->execute();
        $latestNews =$stm->fetchAll(PDO::FETCH_ASSOC);
        return $latestNews;
    }
}