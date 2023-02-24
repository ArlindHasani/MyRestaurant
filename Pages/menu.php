<?php
if (!isset($_SESSION)) {
  session_start();
}

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

    <section class="menu_selector">
        <h2 class="caveat_title">Our Menu</h2>
        <ul class="menu_selector_items">
            <a href="#salad_section" class="button_type2 iceberg_header">Salads</a>
            <a href="#meat_section" class="button_type2 iceberg_header">Meat</a>
            <a href="#seafood_section" class="button_type2 iceberg_header">Seafood</a>
            <a href="#sweets_section" class="button_type2 iceberg_header">Sweets</a>
            <a href="#drinks_section" class="button_type2 iceberg_header">Drinks</a>
        </ul>
    </section>

    <section id="salad_section" class="section_leftToRight">
        <img src="../Images/Salad.png" class="menu_image">
        <div class="content content_leftToRight">
            <p class="iceberg_title section_title">SALADS</p>
            <ul class="menu_items">
                <li class="menu_items_title"><span class="montserrat_paragraph">Caesar Salad</span><br><span class="montserrat_small_paragraph">lettuce, lemon juice, garlic, Worcestershire sauce, fine salt, mayonnaise</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Greek Salad</span><br><span class="montserrat_small_paragraph">cucumbers, tomatoes, green bell pepper, red onion, olives,  feta cheese</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Macaroni Salad</span><br><span class="montserrat_small_paragraph">macaroni, mayonnaise, white sugar, vinegar, mustard, salt, black peppr</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">House Salad</span><br><span class="montserrat_small_paragraph">romaine, cucumber, tomato, red onion, Parmesan, sourdough croutons</span></li>
            </ul>
        </div>
    </section>

    <section id="meat_section" class="section_rightToLeft">
        <div class="content content_rightToLeft">
            <p class="iceberg_title section_title">MEAT</p>
            <ul class="menu_items">
                <li class="menu_items_title"><span class="montserrat_paragraph">Spicy BBQ Chicken</span><br><span class="montserrat_small_paragraph">chicken, spices, bbq sauce, mushrooms, rice</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Beef Ribeye</span><br><span class="montserrat_small_paragraph">2 pieces of ribeye beef, tomatos, mushroom sauce, rice, fries</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Grilled Steak</span><br><span class="montserrat_small_paragraph">steak, fries, mushroom sauce, tomatoes, cucumbers</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Chicken Breast</span><br><span class="montserrat_small_paragraph">3 pieces of chicken breast, friest, mushroom sauce, rice</span></li>
            </ul>
        </div>
        <img src="../Images/Meat.png" class="menu_image">
    </section>

    <section id="seafood_section" class="section_leftToRight">
        <img src="../Images/Seafood.png" class="menu_image">
        <div class="content content_leftToRight">
            <p class="iceberg_title section_title">SEAFOOD</p>
            <ul class="menu_items">
                <li class="menu_items_title"><span class="montserrat_paragraph">Smoked Salmon</span><br><span class="montserrat_small_paragraph">smoked salmon, cucumbers, roasted beetroot, creme fraiche</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Fried Combo</span><br><span class="montserrat_small_paragraph">Shrimp, catfish, fries, cucumbers, creme fraiche</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Crawfish & Shrimp</span><br><span class="montserrat_small_paragraph">2 lb crawfish, 10 boiled shrimp & andouille sausage</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Shrimp & Scallops</span><br><span class="montserrat_small_paragraph">4 grilled shrimp and 4 grilled scallops</span></li>
            </ul>
        </div>
    </section>

    <section id="sweets_section" class="section_rightToLeft">
        <div class="content content_rightToLeft">
            <p class="iceberg_title section_title">SWEETS</p>
            <ul class="menu_items">
                <li class="menu_items_title"><span class="montserrat_paragraph">Chocolate Cake</span><br><span class="montserrat_small_paragraph">sugar, chocolate, milk, eggs, cocoa powder, baking powder</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Blueberry Cake</span><br><span class="montserrat_small_paragraph">blueberries, sugar, butter, vanilla, flour, baking powder, salt, milk</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Velvet Cake</span><br><span class="montserrat_small_paragraph">vegetable oil, salt, buttermilk, cocoa powder, plain flour, soda, sugar</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Cookies</span><br><span class="montserrat_small_paragraph">chocolate chip, toffee, coconut brown butter, chocolate peanute chip</span></li>
            </ul>
        </div>
        <img src="../Images/Sweets.png" class="menu_image">
    </section>

    <section id="drinks_section" class="section_leftToRight">
        <img src="../Images/Drinks.png" class="menu_image">
        <div class="content content_leftToRight">
            <p class="iceberg_title section_title">DRINKS</p>
            <ul class="menu_items">
                <li class="menu_items_title"><span class="montserrat_paragraph">Coffee</span><br><span class="montserrat_small_paragraph">cold, warm</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Tea</span><br><span class="montserrat_small_paragraph">cold, warm, green</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Juice</span><br><span class="montserrat_small_paragraph">Orange, Pear, Apple, Soda</span></li>
                <li class="menu_items_title"><span class="montserrat_paragraph">Alcoholic Beverages</span><br><span class="montserrat_small_paragraph">beer, red wine, white wine, cider, whiskey</span></li>
            </ul>
        </div>
    </section>

    <?php include '../Objektet/footer.php'; ?>

    <script src="../script.js"></script>
</body>
</html>