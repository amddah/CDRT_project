<?php
require "../models/Village.php";
require "../models/Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = isset($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : '';
    $x = isset($_POST['x']) ? htmlspecialchars(trim($_POST['x'])) : '';
    $y = isset($_POST['y']) ? htmlspecialchars(trim($_POST['y'])) : '';

    // Vérifier que toutes les données nécessaires sont présentes
    if (!empty($nom) && !empty($x) && !empty($y)) {
        
        try {
            
            $village = new Village(5, $nom, $x, $y);
            $village->ajouterVillage();
            header('location:../addvillage.php');
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Fermer la connexion
        $pdo = null;
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
