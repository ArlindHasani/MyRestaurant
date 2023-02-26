<?php

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

require('../CRUD/newsCRUD.php');

    if(isset($_FILES['fileToUpload'])) {
        $target_dir = "../Images/NewsImages/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check === false) {
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $imageUrl = $target_file;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imageUrl = $target_file;
                $date = date("y/m/d");
                $newsCRUD = new newsCRUD();

                $newsCRUD->setNewsImage($imageUrl);
                $newsCRUD->setNewsTitle($_POST['editNewsTitle']);
                $newsCRUD->setNewsContent($_POST['editNewsContent']);
                $newsCRUD->setNewsAuthor($_SESSION['userName']);
                $newsCRUD->setNewsEditedOn($date);
                $newsCRUD->addNews();
                header("Location: ../Pages/news.php");
            } else {
            }
        }
    }

?>