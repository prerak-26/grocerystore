<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== CSS ===============-->
    <style>
        <?php include '../css/styles.css';
        ?>
    </style>
</head>

<body>
    <header class="search__header">
        <nav class="search__nav">
            <div class="add_to_cart">
                <a href="cart.php?offerid=1" class="addcart__link button--flex">
                    <i class="ri-shopping-cart-2-line gallery_addcart"></i><p class="cart__itm__number">4</p>
                </a>
            </div>
            <div class="search__nav__menu">
                <form>
                    <i class="ri-search-eye-line"></i>
                    <input type="text" name="" id="search__item" placeholder="Search Products" onkeyup="search()">
                </form>
            </div>
        </nav>
    </header>
    <script><?php include "../js/header.js"; ?></script>
</body>

</html>