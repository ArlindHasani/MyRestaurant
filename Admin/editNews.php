<?php

if (!isset($_SESSION)) {
    session_start();
}

if($_SESSION['accessLevel'] != 'admin'){
    header("Location: ../Pages/index.php");
}


require_once('../CRUD/newsCRUD.php');
$newsCRUD =  new newsCRUD();  
$currentNewsInfo = $newsCRUD->checkNewsInfo($_GET['newsID']);
var_dump($currentNewsInfo);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | EDIT NEWS</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="profile">
            <h2 class="montserrat_header">Hello, <?php echo $_SESSION['userName']?>!</h2>
            <h4 class="montserrat_paragraph">Here are some of the changes you can make to the selected news article!</h4>

    

            <div class="editProfileContainer">
                <div class="editProfileContent">
                    <div id="form">
                        <form  name="adminEditNews" onsubmit="return validateEditNews()" 
                        action= "../AdminFunctions/editNewsVerification.php?newsID=<?php echo $currentNewsInfo['newsID']?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Title</label>
                                <input type="text" name="editNewsTitle" class="" value="<?php echo $currentNewsInfo['newsTitle'];?>"/>
                                <div  class="error-hint hidden">Title is too short or empty</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Content</label>
                                <textarea name="editNewsContent" class="editNewsTextArea"><?php echo $currentNewsInfo['newsContent'];?></textarea>
                                <div  class="error-hint hidden">Content is too short or empty!</div>
                            </div>
                            <div class="form-group">
                                <label class="montserrat_small_paragraph_2">Image</label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <div  class="error-hint hidden"></div>
                            </div>
                            <hr/>
                            <div class="editProfileActions">
                                <button name="saveNewsEdit" type="submit" class="button_type3 saveNewsEdit">Save</button>
                                <button onclick="cancelNewsEdit()" type="submit" class="button_type3 cancelNewsEdit">Cancel</button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </section>

        <?php include '../Objektet/footer.php'; ?>
        <script src="../script.js"></script>
    </body>
</html>