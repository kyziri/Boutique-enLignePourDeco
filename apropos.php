<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
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
    <?php 
    include 'header.php';
    ?>
<main>
        <!--Lien de la page-->
        <section class="lien_pages">
            <ul class="liste_lien-page container">
                <li><a href="index.php" class="lien-page">Accueil</a></li>
                <li><span class="lien-page"><i class="fi fi-rs-angle-right"></i></span></li>
                <li><span class="lien-page">A propos</span></li>        
            </ul>
        </section>

    <section class="about section">
        <h1 class="heading-ab">Qui sommes-nous ?</h1>
        <div class="about_div container">
            <div class="image_about">
                <img src="asset/image/Mood_image-H.jpg" class="image_ab">
            </div>

            <div class="content">
                <h1 class="footer_logonaka">Leamsi<span>Déco</span></h1>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla mauris dolor,
                    gravida a varius blandit, auctor eget purus. Phasellus scelerisque sapien sit amet mauris laoreet,
                    eget scelerisque nunc cursus. Duis ultricies malesuada leo vel aliquet. Curabitur rutrum porta dui
                    eget mollis. Nullam lacinia dictum auctor.</p>
                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                    himenaeos. Orci varius natoque penatibus et magnis dis parturient montes.</p>
            </div>



        </div>


    </section>

    </main>
       <!--==== Footer =====-->
    <?php
    include 'footer.php';
    ?>
        <!--==== SWIPER ====-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!--==== MAIN JS ====-->
        <script src="main.js"></script>

</body>

</html>