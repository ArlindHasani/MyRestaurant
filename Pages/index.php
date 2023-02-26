<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/recipeCRUD.php');
$recipeCRUD = new recipeCRUD();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>MyRestaurant | HOME</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include '../Objektet/header.php';?>

    <section id="home">
        <div class="home_content">
            <h2 class="montserrat_title">FOOD AND ART COMBINED IN ONE PLACE</h2>
            <a href="../Pages/menu.php" class="button_type1 iceberg_header">Explore Our Menu</a>
        </div>
    </section>

    <section id="cards">
        <div class="dinner cards_item">
            <img class="cards_images" src="../images/Dinner.jpeg">
            <h2 class="iceberg_title cards_title">DINNER</h2>
            <div class="cards_text">
                <p class="montserrat_paragraph cards_content">Enjoy an exquisite dinner at our restaurant. Everything is made with passion and love</p>
            </div>
        </div>
        <div class="sweets cards_item">
            <img class="cards_images" src="../images/Snacks.jpeg">
            <h2 class="iceberg_title cards_title">SWEETS</h2>
            <div class="cards_text">
                <p class="montserrat_paragraph cards_content">Well known sweets from all over the world, in one place! Sweeten your day together with us!</p>
            </div>
        </div>
        <div class="drinks cards_item">
            <img class="cards_images" src="../images/Cocktail.jpg">
            <h2 class="iceberg_title cards_title">COCKTAILS</h2>
            <div class="cards_text">
                <p class="montserrat_paragraph cards_content">Enjoy a variety of cocktails made from our worldwide known bartenders. Cold and quick!</p>
            </div>
        </div>
    </section>

    <section id="reserve_section" class="section_leftToRight">
        <img src="../Images/Reserve.jpeg" class="section_image">
        <div class="content content_leftToRight">
            <p class="iceberg_title content_title">RESERVE YOUR TABLE!</p>
            <p class="montserrat_paragraph">Enjoy a private dinner with your friends or family by reserving a table ahead of time!</p>
            <a href="../Pages/reserve.php" class="button_type2 iceberg_header">Reserve Now</a>
        </div>
    </section>

    <section id="menu_section" class="section_rightToLeft">
        <div class="content content_rightToLeft">
            <p class="iceberg_title">EXPLORE OUR MENU</p>
            <p class="montserrat_paragraph">Experience our exquisite menu, created by professional chefs combining some of the finest ingredients available.</p>
            <a href="../Pages/menu.php" class="button_type2 iceberg_header">Explore Menu</a>
        </div>
        <img src="../Images/Menu.png" class="section_image">
    </section>

    <section id="slider">
        <?php $recipes = $recipeCRUD->readRecipes();?>
        <h2 class="iceberg_title">OUR RECIPES</h2>
        <div class="recipes">
            <button class="goLeft"><img src="../Images/arrow.png"></button>
            <button class="goRight"><img src="../Images/arrow.png"></button>
            <?php
            foreach($recipes as $recipe){
            ?>
                <div class="recipt_item">
                    <img class="recipt_image" src=<?php echo $recipe['fotoRecetes']?>>
                    <h2 class="iceberg_title recipt_title"><?php echo $recipe['emriRecetes']?></h2>
                    <div class="recipt_text">
                        <p class="montserrat_paragraph cards_content"><?php echo $recipe['pershkrimiRecetes']?></p>
                    </div>
                </div>
            <?php
            }   
            ?>
        </div>
    </section>
    
    <?php include '../Objektet/footer.php'; ?>

    <script src="../script.js"></script>
</body>
</html>