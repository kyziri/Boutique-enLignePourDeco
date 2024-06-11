<?php
session_start();
include 'config.php';
include 'quantity.php';
include 'authentification.php';

// Récupérer l'ID du produit depuis l'URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Requête pour obtenir les détails du produit
$sql = "SELECT p.*, c.name AS category_name 
        FROM products p 
        JOIN categories c ON p.category_id = c.category_id 
        WHERE p.product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();


// Requête pour obtenir les images du produit
$sql_images = "SELECT image_url FROM product_images WHERE product_id = ?";
$stmt_images = $conn->prepare($sql_images);
$stmt_images->bind_param('i', $product_id);
$stmt_images->execute();
$result_images = $stmt_images->get_result();
$images = [];
while ($row = $result_images->fetch_assoc()) {
    $images[] = $row['image_url'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!--===== Partie header =====-->
    <?php include 'header.php'; ?>

    <main>
        <!--Animation-->
        <section class="Animation"></section>

   <!--Detail du produit-->
<section class="produit_details container">
    <!--Pour l'image de notre produit-->
    <?php if ($product): ?>
        <div class="Image_produit-detail">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="image_principal" id="Main_image">

            <div class="images_petite">
                <!-- Affichage de l'image principale -->
                <div class="petite_img">
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="ptt_img">
                </div>

                <!-- Affichage des images supplémentaires -->
                <?php foreach ($images as $image): ?>
                    <div class="petite_img">
                        <img src="<?php echo htmlspecialchars($image); ?>" class="ptt_img">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <script>
        var imagePrincipal = document.getElementById("Main_image");
            var petitImage = document.getElementsByClassName("ptt_img");

            petitImage[0].onclick = function () {
                imagePrincipal.src = petitImage[0].src;
            }
            petitImage[1].onclick = function () {
                imagePrincipal.src = petitImage[1].src;
            }
            petitImage[2].onclick = function () {
                imagePrincipal.src = petitImage[2].src;
            }
            petitImage[3].onclick = function () {
                imagePrincipal.src = petitImage[3].src;
            }

</script>

                <!--Pour le contenu textuel de produit-->
                <div class="contenu_produit-detail">
                    <ul class="liste_lien-page container">
                        <li><a href="index.php" class="lien-page link">Accueil</a></li>
                        <li><span class="lien-page">/</span></li>
                        <li><span class="lien-page"><?php echo htmlspecialchars($product['name']); ?></span></li>
                    </ul>

                    <h4 class="nom_produit"><?php echo htmlspecialchars($product['name']); ?></h4>
                    <h2 class="prix_produit"><?php echo htmlspecialchars($product['price']); ?> Ar</h2>
                    <form action="add_to_cart.php" method="POST" class="add-to-cart-form">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <label for="quantity">Quantité:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $product['stock_quantity']; ?>" value="1">
                        <button type="submit" class="bouton_cart">Ajouter au panier</button>
                    </form>
                    <h4 class="nom_produit">Détail de produit</h4>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </div>
          
            <?php endif; ?>
        </section>
    </main>

    <!--=== Footer ===-->
    <?php include 'footer.php'; ?>

     <!--==== MAIN JS ====-->
     <script src="main.js"></script> 
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
