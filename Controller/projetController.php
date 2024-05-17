<?php
require "../models/Village.php";
require "../models/Projet.php";
require "../models/Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
    $village = isset($_POST['village']) ? htmlspecialchars(trim($_POST['village'])) : '';
   

    // Vérifier que toutes les données nécessaires sont présentes
    if (!empty($description) && !empty($village) ) {
        
        echo $village;
        try {
            
            $projet = new Projet(1,$description,$village);
            $projet->ajouterProjet();

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
