
<?php
session_start();
include 'config.php'; // Ensure this includes the database connection

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("location:login.php");
    exit();
}

// Vérifier si un produit ID est passé en paramètre
if(isset($_GET['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['product_id'];

    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $product_id);
    if ($stmt->execute()) {
        // Rediriger vers la page du panier après la suppression
        header("Location: cart.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du produit du panier.";
    }
    $stmt->close();
} else {
    echo "ID du produit non spécifié.";
}

$conn->close();
?>
