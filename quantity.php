<?php

// Vérifier si user_id est défini dans la session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Requête SQL pour récupérer les quantités de tous les produits dans le panier
    $sql = "SELECT SUM(quantity) AS total_quantity FROM cart WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête SQL: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result === false) {
        die("Erreur lors de l'exécution de la requête SQL: " . mysqli_stmt_error($stmt));
    }
    $row = mysqli_fetch_assoc($result);
    $total_quantity = $row['total_quantity'] ?? 0;

} else {
    // Si l'utilisateur n'est pas connecté, gérer cette situation (par exemple, définir $total_quantity à 0)
    $total_quantity = 0;
    // Vous pouvez également rediriger l'utilisateur vers une page de connexion ou afficher un message d'erreur.
}
?>
