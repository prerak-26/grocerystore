<!DOCTYPE html>
<html lang="en">

<head>
    <title>list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        <?php include '../css/styles.css';
        ?>
    </style>
</head>

<body>

    <?php include 'header.php' ;?>
    <!--- -------------------------- page overview -------------------- -->
    <div class="product__list container grid">
        <div class="product__list__category">
            <div class="product__category__information">
                <i class="ri-arrow-right-circle-fill"></i>
                <a href="#?categoryid="><p class="product__category__name">Fruit</p></a>
            </div>
            <div class="product__category__information">
                <i class="ri-arrow-right-circle-fill"></i>
                <p class="product__category__name">Fruit</p>
            </div>
            <div class="product__category__information">
                <i class="ri-arrow-right-circle-fill"></i>
                <p class="product__category__name">Fruit</p>
            </div>
        </div>
        <div class="product__list__container grid">
            <div class="gallery__block">
                <form action="list.php" method="post">
                    <div class="gallery__imgblock">
                        <img src="../img/halfsoup.png" alt="" class="gallery__img">
                    </div>
                    <div class="offer_item_description">
                        <div class="offer_item_name">
                            <p>Oreooooo</p>
                        </div>
                        <div class="offer_item_price">
                            <div class="offer_item_newprice">
                                <h3>$1.89</h3>
                            </div>
                            <div class="offer_item_saveprice">Save $1.89</div>
                        </div>
                        <i class="ri-star-half-s-line offer__item__rating">
                            <p>4.5</p>
                        </i>
                    </div>
                    <button class="gallery__button" type="submit" name="add">
                        <i class="ri-shopping-cart-2-line gallery_addcart"> add cart</i>
                    </button>
                    <input type="hidden" name="product_id" value="'.$id.'">
                    <div class="offer__label">
                        <p>New</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>