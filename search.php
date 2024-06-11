

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

<?php
session_start();
include 'config.php';
include 'authentification.php';
include 'quantity.php';
include 'header.php'; 
// Vérifier si une recherche a été soumise
$query = isset($_GET['query']) ? $_GET['query'] : '';

if ($query) {
    // Sécuriser la requête
    $query = htmlspecialchars($query);

    // Requête SQL pour rechercher par nom de produit, catégorie ou prix
    $sql = "SELECT p.*, c.name AS category_name 
            FROM products p 
            JOIN categories c ON p.category_id = c.category_id 
            WHERE p.name LIKE ? OR c.name LIKE ? OR p.price LIKE ?";
    
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param('sss', $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='container produit_container section grid'>";
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
            echo "Aucun résultat trouvé pour '$query'.";
        }
       
    echo "</div>";

    $stmt->close();
} else {
    echo "Veuillez entrer un terme de recherche.";
}

$conn->close();
?>
  
  
  <?php 
    include 'footer.php'; 
    
    ?>
    
</body>
</html>




