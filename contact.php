<?php
session_start();
include 'config.php';

include 'quantity.php';
include 'authentification.php';
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['send'])){
$name = mysqli_real_escape_string($conn, $_POST['nom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$msg = mysqli_real_escape_string($conn, $_POST['message']);

$select_message = mysqli_query($conn, "SELECT * FROM `contacts` WHERE nom = '$name' AND email = '$email' AND message = '$msg'") or die('query failed');

if(mysqli_num_rows($select_message) > 0){
   $message[] = 'message sent already!';
}else{
   mysqli_query($conn, "INSERT INTO `contacts`(user_id, nom, email, message) VALUES('$user_id', '$name', '$email', '$msg')") or die('query failed');
   $message[] = 'message sent successfully!';
}

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">


    <!--===========Mediaqueries link===========-->
    <link rel="stylesheet" href="mediaqueries.css">

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!--=================Swiper=================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Lien vers Jquery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <!-- Latest compiled and minified CSS -->
    

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script> -->
</head>

<body>

    <!--===== Partie header =====-->
        <?php
        include 'header.php'
        ?>
    <!--=== MAIN ==-->
    <main>

        <!--Lien de la page-->
        <section class="lien_pages">
            <ul class="liste_lien-page container">
                <li><a href="index.php" class="lien-page link">Accueil</a></li>
                <li><span class="lien-page"><i class="fi fi-rs-angle-right"></i></span></li>
                <li><span class="lien-page">Contact</span></li>
            </ul>

        </section>

        <!--Animation-->
        <section class="Animation">
        </section>

        <!-- La partie Contact -->
        <section class="contact-info section container ">
            <h1 class="heading-ab"> Contacter-nous</h1>
            <div class="diveder"></div>

            <div class="contenir">
            <form action="" method="post" class="auth_form">

                <div class="form_group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" class="form_input" />
                  </div>

                <div class="form_group">
                  <label for="email">Email</label>
                  <input id="email" type="email" name="email" placeholder="Votre email" class="form_input" />
                </div>
  
                <div class="form_group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" name="message" placeholder="Votre message" cols="30" rows="6" class="form_input"></textarea>
                </div>
  
             <div class="form_group">
              <button type="submit" name="send" class="form_btn">Envoyer</button>
              </div>
              </form>
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