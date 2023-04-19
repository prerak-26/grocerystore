<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
    <style><?php include 'assets/css/styles.css'; ?></style>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <title>Shop Online</title>
</head>
<body>

    <?php include 'assets/php/dbconnect.php';?>

    <?php
        $error = false;
        if(isset($_POST["signupdata"])){
            $user_email = $_POST["useremail"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`email_address`,`password`,`Date`) VALUES ('$user_email','$hash', current_timestamp())";
                $result = mysqli_query($conn,$sql);
            }
            else{
                $error = "Password is not matching!!";
            }
        }
    ?>
    <?php
        $user_login = false;
        if(isset($_POST["logindata"])){
            $login_email = $_POST["loginuseremail"];
            $login_password = $_POST["loginpassword"];
            $sql = "SELECT * FROM `user` WHERE email_address='$login_email'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    if (password_verify($login_password, $row['password'])){
                        $_SESSION['loggedin'] = true;
                        $user_login = true;
                    }
                }
            }
        }
    ?>

    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">ShopOnline</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#special" class="nav__link">Special</a>
                    </li>
                    <li class="nav__item">
                        <a href="#discover" class="nav__link">Discover</a>
                    </li>
                    <?php
                        if(!$user_login){
                            echo '<button class="nav__item nav__link reg__btn" id="login_id" type="submit" >
                                    Login/Signup
                                </button>';
                        }else{
                            echo '<button class="nav__item nav__link reg__btn" id="logout_id" type="submit" >
                                    <a href="logout.php" style="color:black">LogOut</a>
                                </button>';
                        }
                    ?>
                    
                    <li class="nav__item">
                        <a href="#" class="addcart__link button--flex reg__btn"><i class="ri-shopping-cart-2-line nav__link"></i>4</a>
                    </li>
                </ul>

                <div class="nav__dark">
                    <!-- Theme change button -->
                    <span class="change-theme-name">Dark mode</span>
                    <i class="ri-moon-line change-theme" id="theme-button"></i>
                </div>

                <i class="ri-close-line nav__close" id="nav-close"></i>
                
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
    </header>


    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            
        <?php 
         $sql = "SELECT * FROM `home`"; 
         $result = mysqli_query($conn, $sql);
         for($i=0;$row = mysqli_fetch_assoc($result);$i++){
            $imgpath[$i] = $row['image'];
         };
         ?>

         <?php echo '<img src="'.$imgpath[0].'" alt="" class="home__img">'; ?>

            <div class="home__container container grid">
                <div class="home__data">
                    <span class="home__data-subtitle">You deserve the Best!</span>
                    <h1 class="home__data-title"><b>Shop</b> <br>on a<br><b>Budget</b></h1>
                    <a href="#discover" class="button">Explore</a>
                </div>

                <div class="home__social">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        <i class="ri-facebook-box-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        <i class="ri-twitter-fill"></i>
                    </a>
                </div>

                <div class="home__info">
                    <div>
                        <span class="home__info-title">Top most Selected</span>
                        <a href="#special" class="button button--flex button--link home__info-button">
                            More <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>

                    <div class="home__info-overlay">
                        <?php echo '<img src="'.$imgpath[1].'" alt="" class="home__info-img">';?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="loginsignup">
      <div class="login__form__container" id="login_request">
        <div class="login__form__close">
            <i class="ri-close-fill"></i>
        </div>
        <!-- Login From -->
        <div class="form__login login__form">
          <form action="index.php" method="post">
            <h2>Login</h2>

            <div class="login__input__box">
              <input type="email" placeholder="Enter your email" name="loginuseremail" required />
              <i class="ri-mail-send-line login__email"></i>
            </div>
            <div class="login__input__box">
              <input type="password" placeholder="Enter your password" name="loginpassword" required />
              <i class="ri-lock-2-line password"></i>
              <i class="ri-eye-off-line pw_hide"></i>
            </div>

            <div class="login__option__field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="login__forgot__pw">Forgot password?</a>
            </div>

            <button class="login__button" name="logindata">Login Now</button>

            <div class="login__signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
          </form>
        </div>

        <!-- Signup From -->
        <div class="form__signup signup__form">
          <form action="index.php" method="post">
            <h2>Signup</h2>

            <div class="login__input__box">
              <input type="email" id="user_email" name="useremail" placeholder="Enter your email" required />
              <i class="ri-mail-send-line login__email"></i>
            </div>
            <div class="login__input__box">
              <input type="password" id="password" name="password" placeholder="Create password" required />
              <i class="ri-lock-2-line password"></i>
              <i class="ri-eye-off-line pw_hide"></i>
            </div>
            <div class="login__input__box">
              <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" required />
              <i class="ri-lock-2-line password"></i>
              <i class="ri-eye-off-line pw_hide"></i>
            </div>
            <?php if($error){echo '<p style="color:red; font-size:0.6rem;">'.$error.'</p>';} ?>
            <button class="login__button" type="submit" name="signupdata">Signup Now</button>

            <div class="login__signup">Already have an account? <a href="#" id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section>


<!--     ================================== Info__model ==================================== -->
    <section class="section" id="info">
        <div class="info__model container grid">
            <div class="info__container">
                <div class="info__box">
                    <h2 class="section__title">Welcome to our new site, see what's new.</h2>
                    <p class="info__description">From shopping the catalogue online to finding products and checking out – we've upgraded
                    to make your shop easier.</p>
                </div>
                <div class="info__button__section">
                    <a href="components/selected.html" class="info__button">Log in or sign up</a>
                    <a href="components/selected.html" class="info__button">Discover what's new</a>
                </div>
            </div>
        </div>
    </section>

            <!--==================== DISCOVER ====================-->
        <section class="discover section" id="discover">
            <h2 class="section__title">Discover the most <br>Attractive Offers</h2>
                <div class="grid__wrapper grid container">
                <?php
                        $sql = "SELECT * FROM `offercard`"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['offer_id'];
                            $offercardpath = $row['offerimgpath'];
                            echo '<div class="grid__img__box">
                                    <a href="assets/php/offers.php?offerid='.$id.'"><img src="'.$offercardpath.'" alt="" class="grid__img"></a>
                                </div>';
                        }
                    ?> 
                </div>
        </section>

<!--==================== EXPERIENCE ====================-->
        <section class="experience section" id="experience">
            <h2 class="section__title">With Our Experience <br> We Will Serve You</h2>

            <div class="experience__container container grid">
                <div class="experience__content grid">
                <?php
                        $sql = "SELECT * FROM `experienceinformation`"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $experience_num = $row['experience_number'];
                            $experience_des = $row['experience_description'];
                            echo '<div class="experience__data">
                                    <h2 class="experience__number">'.$experience_num.'</h2>
                                    <span class="experience__description">'.$experience_des.'</span>
                                </div>';
                        }
                    ?>
                </div>

                <div class="experience__img grid">
                <?php
                        $sql = "SELECT * FROM `experienceimage`"; 
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $experience_img_path = $row['experience_imgpath'];
                            $experience_img_class = $row['class_name'];
                            echo '<div class="experience__overlay">
                                    <img src="'.$experience_img_path.'" alt="" class="'.$experience_img_class.'">
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </section>


    <!--=====================  Download =========================== -->
    <section class="download section" id="download">
        <div class="download__container">
            <div class="download__info">
                <h2 class="download__title">Shopping made easy with the ShopOnline app</h2>
                <p class="download__description">Order groceries on the go or use it in-store as a product finder. You'll see the aisle to go to.</p>
                <div class="download__img__container">
                    <img src="assets/img/icon.png" alt="" class="download__img">
                </div>
            </div>
            <div class="download__poster">
                <img src="assets/img/poster.png" alt="" class="download__poster__img">
            </div>
        </div>
    </section>

    <!--==================== SUBSCRIBE ====================-->
    <?php 
        if(isset($_POST['subscribe'])){
            $email = $_POST['emailaddress'];
            $sql = "INSERT INTO `subscribers` (`email`,`date`) VALUES ('$email', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            $to_email = $email;
            $subject = "Thank you for subscribing to us";
            $body = "Hi, You will be notified whenever new offers are released.
            We are happy to tell you from now onwards you will get a 10% discount on every item as you are so glad customer of ShopOnline.";
            $headers = "From: shoponline2557@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
            } else {
                echo "Email sending failed...";
            }
        }
    ?>
    <section class="subscribe section" id="subscription">
            <div class="subscribe__bg">
                <div class="subscribe__container container">
                    <h2 class="section__title subscribe__title">Subscribe Our <br> Newsletter</h2>
                    <p class="subscribe__description">Subscribe to our newsletter and get a
                        special 30% discount.
                    </p>
                    <form action="index.php" class="subscribe__form" method="post">
                        <input type="email" placeholder="Enter email" class="subscribe__input" name="emailaddress">

                        <button class="button" type="submit" name="subscribe">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!--==================== SPONSORS ====================-->
        <section class="sponsor section" id="sponsor">
            <div class="sponsor__container container grid">
            <?php 
            $sql = "SELECT * FROM `sponsor`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $sponsor_img_path = $row['sponsorimg'];
                echo '<div class="sponsor__content">
                        <img src="'.$sponsor_img_path.'" alt="" class="sponsor__img">
                    </div>';
            }
        ?>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section" id="footer">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div class="footer__data">
                    <h3 class="footer__title">ShopOnline</h3>
                    <p class="footer__description">Choose the <br> product,
                        we offer you the <br> experience.
                    </p>
                    <div>
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">About</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">About Us</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Features</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">New & Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                        <h3 class="footer__subtitle">Company</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">Team</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Plan y Pricing</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Become a member</a>
                            </li>
                        </ul>
                    </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Support</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">FAQs</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Support Center</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__rights">
                <p class="footer__copy">&#169; 2023 ShopOnline. All rigths reserved.</p>
                <div class="footer__terms">
                    <a href="" class="footer__terms-link">Terms & Agreements</a>
                    <a href="" class="footer__terms-link">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>


    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <script><?php include "assets/js/scrollreveal.min.js"; ?></script>
    <script><?php include "assets/js/main.js"; ?></script>
    
</body>
</html>