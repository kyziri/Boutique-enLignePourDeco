<?php

include 'config.php';
include 'authentification.php';

if(isset($_POST['submit'])){

   $nom = mysqli_real_escape_string($conn, $_POST['nom']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(nom, email,telephone, password) VALUES('$nom', '$email','$phone', '$cpass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
         exit();
      }
   }

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>

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

    <!-- Enregistrer un utilisateur -->
    <section class="section ">
        <div class="auth_container">
          <div class="auth_img">
            <img src="asset/image/Generic_image_portrait.jpg" alt="" class="auth_image" />
          </div>


          <?php
                if (!empty($message)) {
                    foreach ($message as $msg) {
                        echo '<p class="message">' . $msg . '</p>';
                    }
                }
                ?>

          <!-- Partie dans laquelle on remplie les champs -->
          <div class="auth_content">
            <form action="Registration.php" method="post" class="auth_form" role="form">
              <h2 class="form_title">CREER UN COMPTE</h2>
              <div class="form_group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" required class="form_input" />
              </div>
              <div class="form_group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Votre email" required class="form_input" />
              </div>
              <div class="form_group">
                <label for="phone">Téléphone</label>
                <input id="phone" type="tel" name="phone" placeholder="Votre Téléphone" required class="form_input" />
              </div>
              <div class="form_group form_pass">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" placeholder="Votre mot de passe" required class="form_input" />
              </div>
              <div class="form_group form_pass">
                <label for="cpassword">Mot de passe</label>
                <input id="cpassword" type="password" name="cpassword" placeholder="Votre mot de passe" required class="form_input" />
              </div>

              <div class="form_group">
              <button type="submit" name="submit" class="form_btn">Créer</button>
              </div>
              <div class="form_group">
                <span>As-tu déjà un compte? <a href="login.php" class="form_auth_link">Se connecter</a></span>
              </div>
            </form>
          </div>
        </div>
      </section>


    <!--======== Partie Footer ======-->
    <footer>
        <div class="footer_container container grid">
            <div class="footer_content">
                <a href="index.html" class="footer_logo">
                    <h1 class="footer_logonaka">Leamsi<span>Déco</span></h1>
                    <p class="logo_slogan">La déco tout en un à portée de main</p>
                </a>

            </div>

            <!--Pour le contact-->
            <div class="footer_content">
                <h3 class="footer_titre">Contact</h3>
                <p class="footer_description">
                    <span>Adresse : </span>Lazaret Cure Bloc F28
                </p>
                <p class="footer_description">
                    <span>Tel : </span>+261 32 55 671 89
                </p>

                <div class="footer_reseau-sociaux">
                    <h4 class="footer_subtitle">Suivez-nous</h4>
                    <div class="footer_rs-lien">
                        <!--Lien vers facebook-->
                        <a href="https://www.facebook.com/profile.php?id=100006112996990">
                            <img src="asset/image/icon-facebook.svg" alt="" class="icon_rs">
                        </a>
                        <!--Lien vers instagram-->
                        <a href="">
                            <img src="asset/image/icon-instagram.svg" alt="" class="icon_rs">
                        </a>

                    </div>
                </div>
            </div>

            <div class="footer_content">
                <h3 class="footer_titre">Catégories</h3>
                <ul class="footer_liens">
                    <li>
                        <a href="index.html" class="footer_lien">Accueil</a>
                    </li>
                    <li>
                        <a href="#" class="footer_lien">Textile</a>
                    </li>
                    <li>
                        <a href="meuble-product.html" class="footer_lien">Meubles</a>
                    </li>
                    <li>
                        <a href="luminaire-product.html" class="footer_lien">Luminaire</a>
                    </li>
                    <li>
                        <a href="#" class="footer_lien">Déco</a>
                    </li>

                </ul>
            </div>

            <!--Pour l'information du site-->
            <div class="footer_content">
                <h3 class="footer_titre">Information</h3>
                <ul class="footer_liens">
                    <li>
                        <a href="apropos.html" class="footer_lien">Qui sommes-nous ?</a>
                    </li>
                    <li>
                        <a href="contact.html" class="footer_lien">Nous contacter</a>
                    </li>

                </ul>
            </div>
        </div>

        <!--Pour le copyright-->
        <div class="footer_bottom container">
            <p class="copyright">
                &copy;2024 LeamsiDéco, All right reserved
            </p>
            <span class="fait_par">Leamsitech firm</span>
        </div>

    </footer>



</body>

</html>