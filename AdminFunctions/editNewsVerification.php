<?php

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}

require('../CRUD/newsCRUD.php');

if (isset($_GET['newsID'])) {
    if(isset($_FILES['fileToUpload'])) {
        $target_dir = "../Images/NewsImages/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check === false) {
            echo "Sorry, the file you uploaded is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $imageUrl = $target_file;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, the file you uploaded is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imageUrl = $target_file;
                $date = date("y/m/d");
                $newsCRUD = new newsCRUD();
                $newsCRUD->setNewsID($_GET['newsID']);

                $newsCRUD->setNewsImage($imageUrl);
                $newsCRUD->setNewsTitle($_POST['editNewsTitle']);
                $newsCRUD->setNewsContent($_POST['editNewsContent']);
                $newsCRUD->setNewsAuthor($_SESSION['userName']);
                $newsCRUD->setNewsEditedOn($date);
                $newsCRUD->editNews();
                header("Location: ../Pages/news.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>