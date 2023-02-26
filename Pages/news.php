<?php
if (!isset($_SESSION)) {
  session_start();
}

if($_SESSION['accessLevel'] == 'admin'){
    $newsAdminAccess = "";
}else{
    $newsAdminAccess = "hidden";
}

require_once('../CRUD/newsCRUD.php');
$newsCRUD = new newsCRUD();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant | NEWS</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
        <link rel="stylesheet" href="../styles.css">
    </head>
    <body>
        <?php include '../Objektet/header.php'; ?>

        <section id="newsHeader">
            <h2 class="montserrat_title">Keep up with the latest news surrounding our restaurant and the world of cooking</h2>
        </section> 

        <section id="latestNews">
        <?php $latestNews = $newsCRUD->readLatestNews();?>
            <h3 class="montserrat_header">LATEST NEWS</h3>
            <div class="latestNews">
            <?php
                foreach($latestNews as $latest){
            ?>
                <div class="latestNewsContainer">
                    <img class="latestNewsImage" src=<?php echo$latest['newsImage']?>>
                    <div class="newsContentContainer">
                        <h4 class="latestNewsTitle montserrat_header"><?php echo$latest['newsTitle']?></h4>
                        <p class="latestNewsContent montserrat_paragraph"><?php echo$latest['newsContent']?></p>
                    </div>
                    <div class="latestNewsFooter">
                        <p class="latestNewsAuthor montserrat_paragraph"><?php echo$latest['newsAuthor']?></p>
                        <p class="latestNewsLastEdit montserrat_paragraph"><?php echo$latest['newsEditedOn']?></p>
                    </div>
                    <div class="newsActions">
                        <a href="../AdminFunctions/deleteNews.php?newsID=<?php echo $latest['newsID']?>">
                            <button type="submit" class="button_type4 deleteNews <?php echo $newsAdminAccess ?>">Delete</button>
                        </a>
                        <a href="../Admin/editNews.php?newsID=<?php echo $latest['newsID']?>">
                            <button type="submit" class="button_type4 editNews <?php echo $newsAdminAccess ?>">Edit</button>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="news">
        <?php $allNews = $newsCRUD->readNews();?>
            <h3 class="montserrat_header">NEWS</h3>
            <a href="../Admin/addNews.php">
                <button type="submit" class="button_type3 addArticle <?php echo $newsAdminAccess ?>">ADD ARTICLE</button>
            </a>
            <div class="news">
            <?php
                foreach($allNews as $news){
            ?>
                <div class="newsContainer">
                    <img class="newsImage" src=<?php echo$news['newsImage']?>>
                    <div class="newsContentContainer">
                        <h4 class="newsTitle montserrat_header"><?php echo$news['newsTitle']?></h4>
                        <p class="newsContent montserrat_paragraph"><?php echo$news['newsContent']?></p>
                        <div class="newsFooter">
                            <p class="newsAuthor montserrat_paragraph"><?php echo$news['newsAuthor']?></p>
                            <p class="newsLastEdit montserrat_paragraph"><?php echo$news['newsEditedOn']?></p>
                        </div>
                        <div class="newsActions">
                            <a href="../AdminFunctions/deleteNews.php?newsID=<?php echo $news['newsID']?>">
                                <button type="submit" class="button_type4 deleteNews <?php echo $newsAdminAccess ?>">Delete</button>
                            </a>
                            <a href="../Admin/editNews.php?newsID=<?php echo $news['newsID']?>">
                                <button type="submit" class="button_type4 editNews <?php echo $newsAdminAccess ?>">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <?php require_once('../objektet/footer.php')?>
        <script src="../script.js"></script>
    </body>
    
</html>