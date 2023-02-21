<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/newsCRUD.php');
$newsCRUD = new newsCRUD();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>MyRestaurant</title>
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
                    <h4 class="latestNewsTitle montserrat_header"><?php echo$latest['newsTitle']?></h4>
                    <p class="latestNewsContent montserrat_paragraph"><?php echo$latest['newsContent']?></p>
                    <div class="latestNewsFooter">
                        <p class="latestNewsAuthor montserrat_paragraph"><?php echo$latest['newsAuthor']?></p>
                        <p class="latestNewsLastEdit montserrat_paragraph"><?php echo$latest['newsEditedOn']?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="news">
        <?php $latestNews = $newsCRUD->readNews();?>
            <h3 class="montserrat_header">NEWS</h3>
            <div class="news">
            <?php
                foreach($latestNews as $latest){
            ?>
                <div class="newsContainer">
                    <img class="newsImage" src=<?php echo$latest['newsImage']?>>
                    <div class="newsContentContainer">
                        <h4 class="newsTitle montserrat_header"><?php echo$latest['newsTitle']?></h4>
                        <p class="newsContent montserrat_paragraph"><?php echo$latest['newsContent']?></p>
                        <div class="newsFooter">
                            <p class="newsAuthor montserrat_paragraph"><?php echo$latest['newsAuthor']?></p>
                            <p class="newsLastEdit montserrat_paragraph"><?php echo$latest['newsEditedOn']?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

    </body>
    <script src="../script.js"></script>
</html>