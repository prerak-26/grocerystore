<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <style>
            <?php include '../css/styles.css';
            ?>
        </style>

        <title>Offers</title>
    </head>

    <body>
    <?php include 'dbconnect.php';?>

    <!-- ================= Header =====================-->
    <?php include 'header.php';?>

        <main class="main gallery__section">

            <!--================== gallery ========================-->
            

            <div class="gallery__container container grid">
            <?php
                        
                        $offerid = $_GET['offerid'];
                        $sql = "SELECT * FROM `offer_list` WHERE offer_id = '" . mysqli_escape_string($conn,$offerid) . "'"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['product_id'];
                            $name = $row['product_name'];
                            $offerimpath = $row['offer_list_img'];
                            $offernewprice = $row['offer_itm_newprice']; 
                            $offersaveprice = $row['offer_itm_saveprice']; 
                            $offerlabel = $row['offer_itm_label']; 
                            $offerrating = $row['offer_itm_rating']; 
                            echo '<div class="gallery__block">
                            <form action="offers.php" method="post">
                                <div class="gallery__imgblock">
                                    <img src="'.$offerimpath.'" alt="" class="gallery__img" id="gallery__img">
                                </div>
                                <div class="offer_item_description">
                                    <div class="offer_item_name"><p id="offer_item_name">'.$name.'</p></div>
                                    <div class="offer_item_price">
                                        <div class="offer_item_newprice">
                                            <h3 id="offer_item_newprice">'.$offernewprice.'</h3>
                                        </div>
                                        <div class="offer_item_saveprice">'.$offersaveprice.'</div>
                                    </div>
                                    <i class="ri-star-half-s-line offer__item__rating"><p>'.$offerrating.'</p></i>
                                </div>
                                <div class="gallery__button">
                                     <a href="cart.php?offerid='.$offerid.'"><i class="ri-shopping-cart-2-line gallery_addcart"> add cart</i></a>
                                </div>
                                <div class="offer__label">
                                    <p>'.$offerlabel.'</p>
                                </div>
                            </form>
                        </div>';
                        }
                    ?>
            </div>
        </main>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>
        
        <script type="module"><?php include "../js/offers.js"; ?></script>
    </body>

</html>