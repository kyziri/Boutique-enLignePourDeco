<?php
session_start();
include 'config.php';



// Récupérez les informations de l'utilisateur connecté
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

include 'quantity.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en ligne pour decoration</title>

    <!--=================Lien CSS==============-->
    <link rel="stylesheet" href="style.css">

    <!--===========Mediaqueries link===========-->
    <link rel="stylesheet" href="mediaqueries.css">

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!--=================Swiper=================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>

    
<!--=======CREATION HEADER=======-->
<?php
    include 'header.php';
?>
    <!--======== Partie Main =======-->
    <main>
        <div class="slider">
            <div class="sliderbox swiper">
                <div class="wrap swiper-wrapper">
                    <div class="item swiper-slide">
                        <div class="image">
                            <div class="images">
                                <img src="asset/image/meubleswip.jpg" alt="">
                            </div>
                            <div class="info_title">
                                <div class="container wide">
                                    <div class="wrap">
                                        <h3 class="title_image">Nous vous offrons des meilleurs de nos meubles</h3>

                                        <div class="button">
                                            <a href="meuble-product.php" class="btn_shop">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Slide2-->
                    <div class="item swiper-slide">
                        <div class="image">
                            <div class="images">
                                <img src="asset/image/LuminaireSwiper.webp" alt="">
                            </div>
                            <div class="info_title">
                                <div class="container wide">
                                    <div class="wrap">
                                        <h3 class="title_image"> Éclairez vos espaces, éveillez vos sens !</h3>

                                        <div class="button">
                                            <a href="luminaire-product.php" class="btn_shop">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Slide3-->
                    <div class="item swiper-slide">
                        <div class="image">
                            <div class="images">
                                <img src="asset/image/Tapisswip.jpg" alt="">
                            </div>
                            <div class="info_title">
                                <div class="container wide">
                                    <div class="wrap">
                                        <h3 class="title_image">Les Tapis</h3>

                                        <div class="button">
                                            <a href="tapis.php" class="btn_shop">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>

        <!--============Categories===============-->
        <section class="categories container section">
            <h3 class="section__title"><span>Nos</span> Categories</h3>

            <div class="categories__container swiper_1">
                <div class="swiper-wrapper">
                    <a href="meuble-product.php" class="category__item swiper-slide">
                        <img src="asset/image/categori_1.webp" alt="" class="category__img">
                        <h3 class="category__title">Meubles</h3>
                    </a>

                    <a href="luminaire-product.php" class="category__item swiper-slide">
                        <img src="asset/image/categori_2.webp" alt="" class="category__img">
                        <h3 class="category__title">Luminaires</h3>
                    </a>

                    <a href="deco.php" class="category__item swiper-slide">
                        <img src="asset/image/categori_3.webp" alt="" class="category__img">
                        <h3 class="category__title">Déco</h3>
                    </a>

                    <a href="tapis.php" class="category__item swiper-slide">
                        <img src="asset/image/categori_4.webp" alt="" class="category__img">
                        <h3 class="category__title">Tapis</h3>
                    </a>
                    <a href="deco.php" class="category__item swiper-slide">
                        <img src="asset/image/categori_5.webp" alt="" class="category__img">
                        <h3 class="category__title">Linge de maison</h3>
                    </a>

                </div>

                <div class="swiper-btn-next"><i class="fi fi-rs-angle-right"></i></div>
                <div class="swiper-btn-prev"><i class="fi fi-rs-angle-left"></i></div>

            </div>
        </section>

        <!--========About========-->
        <section class="about container section">
            <h3 class="section__title"><span>A</span> propos</h3>
            <div class="about_section ">
                <p> Leamsi<span>Déco</span> est une boutique en ligne qui a comme mission d'embellir votre Déco
                    Intérieur, de faire de votre maison la plus belle et aussi la plus agréable possible. Nous savons
                    exactement que se sentir bien chez-soi est une chose indispensable pour notre bien-être personnel.
                    Grâce à notre déco votre maison va devenir une espace ... <a href="apropos.php"
                        class="btn_know">Savoir plus</a>
                </p>

            </div>
        </section>

    </main>


    <!--======== Partie Footer ======-->
<?php
    include 'footer.php'
?>


    <!--============Pour le swiper=========-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--============MainJs===============-->
    <script src="main.js"></script>
</body>

</html>