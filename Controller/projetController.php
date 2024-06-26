<?php
require "../models/Village.php";
require "../models/Projet.php";
require "../models/Connection.php";
require "../models/Section.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
    $village = isset($_POST['village']) ? htmlspecialchars(trim($_POST['village'])) : '';
   

    
$titres = $_POST['titre_section'];
$descriptions = $_POST['description_section'];
$images = $_FILES['image_section'];

// Créez un dossier pour stocker les images si ce n'est pas déjà fait
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

    // Vérifier que toutes les données nécessaires sont présentes
    if (!empty($description) && !empty($village) ) {
        
        echo $village;
        try {
            
            $projet = new Projet(1,$description,$village);
            $projet->ajouterProjet();
                echo $descriptions;
            foreach ($titres as $index => $titre) {
                $descriptions = $descriptions[$index];
                $image_tmp = $images['tmp_name'][$index];
                $image_name = $images['name'][$index];
                $upload_file = $upload_dir . basename($image_name);
            
                // Déplacer le fichier uploadé
                if (move_uploaded_file($image_tmp, $upload_file)) {
                    $section= new Section(1, $description, $image_name, 5); // Assurez-vous de définir $village_id
                    $section->ajouterSection();
                } else {
                    echo "Erreur lors de l'upload de l'image.";
                }
            }
            

            //header('location:../addvillage.php');
           
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
