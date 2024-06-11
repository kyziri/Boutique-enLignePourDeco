<?php
session_start();
include 'config.php';
include 'quantity.php';
include 'authentification.php';

// Récupérer les produits dans le panier pour l'utilisateur actuel
$user_id = $_SESSION['user_id']; // Supposons que vous stockez l'ID de l'utilisateur dans la session
$sql = "SELECT p.product_id, p.image_url, p.name AS product_name, p.price, c.quantity
        FROM products p
        JOIN cart c ON p.product_id = c.product_id
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialiser le total
$total_price = 0;
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panier</title>
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
     include 'header.php';
    ?>
    <!--=== MAIN ==-->
    <main>

        <!--Lien de la page-->
        <section class="lien_pages">
            <ul class="liste_lien-page container">
                <li><a href="index.php" class="lien-page link">Accueil</a></li>
                <li><span class="lien-page"><i class="fi fi-rs-angle-right"></i></span></li>
                <li><span class="lien-page">Panier</span></li>
            </ul>

        </section>


        <!-- La partie dans laquelle on affiche tous les produit dans le panier -->
        <section class="container section cart ">
            <table width="100%">
                <!-- Nom de chaque colonne -->
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>Nom</td>
                        <td>Prix</td>
                        <td>Quantité</td>
                        <td>Action</td>
                    </tr>

                </thead>
                <!-- Pour le produit -->
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                        <?php
                            $subtotal = $row['price'] * $row['quantity'];
                            $total_price += $subtotal;
                        ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>"></td>
                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['price']); ?> Ar</td>
                            <td><input type="number" value="<?php echo $row['quantity']; ?>"></td>
                            <td><a href="supprimer_du_panier.php?product_id=<?php echo htmlspecialchars($row['product_id']); ?>">Supprimer</a></td>

                        </tr>
                <?php endwhile; ?>
            </tbody>


            </table>
        </section>

        <!-- Section Total -->
        <section class="container section total-section">
            <div class="total-container">
                <div class="total-item">
                    <span class="total-label">Sous-total :</span>
                    <span class="total-value"><?php echo $total_price; ?> Ar</span>
                </div>
                <div class="total-item">
                    <span class="total-label">Frais de livraison :</span>
                    <span class="total-value">5.000Ar</span>
                </div>
                <div class="total-item total-final">
                    <span class="total-label">Total :</span>
                    <span class="total-value"><?php echo $total_price + 5000; ?> Ar</span>
                </div>
            </div>
        </section>

<!-- Section Adresse de livraison et Mode de paiement -->
<section class="container section address-payment-section">
    <!-- Section Adresse de livraison -->
    <div class="address-section"> 
        <h2>Adresse de livraison</h2>
        <form class="address-form">
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" class="form_input">
            </div>
            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" id="city" name="city" class="form_input">
            </div>
            <div class="form-group">
                <label for="postal-code">Code Postal</label>
                <input type="text" id="postal-code" name="postal-code" class="form_input">
            </div>
        </form>
    </div>
    
    <!-- Section Mode de paiement -->
    <div class="payment-section">
        <h2>Mode de paiement</h2>
        <form class="payment-form">
            <div class="form-group">
                <label for="payment-method">Méthode de paiement</label>
                <select id="payment-method" name="payment-method">
                    <option class="form_input" >select</option>
                    <option value="credit-card">Carte de Crédit</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank-transfer">Virement Bancaire</option>
                </select>
            </div>

             <!-- Champs pour les détails de la carte de crédit -->

            

            <div id="credit-card-details" class="hidden">
                <div class="form-group">
                    <label for="card-number">Numéro de carte</label>
                    <input type="text" id="card-number" name="card-number"  class="form_input">
                </div>
                <div class="form-group">
                    <label for="expiry-date">Date d'expiration</label>
                    <input type="text" id="expiry-date" name="expiry-date"  class="form_input" >
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv"  class="form_input">
                </div>
            </div>
            <div id="payment-instructions"></div>
            <button type="submit" class="btn">Payer</button>
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