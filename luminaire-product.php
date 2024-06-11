<?php
session_start();
include 'config.php';
include 'quantity.php';
// Initialiser les variables utilisateur
include 'authentification.php';

// Requête pour obtenir les produits de la catégorie "Tapis"
$category_name = 'Luminaire';
$sql = "SELECT p.*, c.name AS category_name 
        FROM products p 
        JOIN categories c ON p.category_id = c.category_id 
        WHERE c.name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $category_name);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminaire</title>
    <link rel="stylesheet" href="style.css">

    <!--===========Mediaqueries link===========-->
    <link rel="stylesheet" href="mediaqueries.css">

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    
    <!--=================Swiper=================-->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
</head>
<body>
    <!--=== Partie Header ===-->
    <?php include 'header.php'; ?>
 
    <!--=== MAIN ==-->
    <main>
        <!--Lien de la page-->
        <section class="lien_pages">
            <ul class="liste_lien-page container">
                <li><a href="index.php" class="lien-page">Accueil</a></li>
                <li><span class="lien-page"><i class="fi fi-rs-angle-right"></i></span></li>
                <li><span class="lien-page">Luminaire</span></li>        
            </ul>
        </section>

        <!--===============Nos Produit===============-->
        <section class="produit section container">
            <h3 class="section__title"><span>Nos</span> Luminaire</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, itaque minima debitis perspiciatis exercitationem ducimus, temporibus, cumque provident qui atque molestiae alias vel consequuntur similique voluptatem. Id excepturi iusto earum!</p>

            <!--les differents produits-->
            <div class="produit_container section grid">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='mon_produit'>";
                        echo "<a href='product.php?id=" . $row['product_id'] . "' class='image_produit'>";
                        echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' class='product_img default'>";
                        echo "</a>";
                        echo "<div class='descri_produit'>";
                        echo "<h5 class='titre_produit'>" . htmlspecialchars($row['name']) . "</h5>";
                        echo "<div class='product_price'><span>" . htmlspecialchars($row['price']) . " Ar</span></div>";
                        echo "</div>";
                        echo "<a href='add_to_cart.php?id=" . $row['product_id'] . "' class='action_btn cart_btn' aria-label='Ajouter au panier'>";
                        echo "<i class='fi fi-rs-shopping-bag-add'></i>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucun produit trouvé dans la catégorie Luminaire.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    
    <!--==== Footer =====-->
    <?php include 'footer.php'; ?>
    
    <!--==== SWIPER ====-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!--==== MAIN JS ====-->
    <script src="main.js"></script> 
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
