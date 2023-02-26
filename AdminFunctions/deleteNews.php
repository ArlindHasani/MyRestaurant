<?php 

require('../CRUD/newsCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}else if(isset($_GET['newsID'])){
    $newsCRUD = new newsCRUD();
    $newsCRUD->setNewsID($_GET['newsID']);
    $newsCRUD->deleteNews();
    header("Location: ../Pages/news.php");
}else{
    header("Location: ../Pages/news.php");
}

?>