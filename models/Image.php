<?php

class Image {
    // Propriétés
    private $id;
    private $titre;
    private $lien;

    // Constructeur
    public function __construct($id, $titre, $lien) {
        $this->id = $id;
        $this->titre = $titre;
        $this->lien = $lien;
    }

    // Getter pour l'ID
    public function getId() {
        return $this->id;
    }

    // Setter pour l'ID
    public function setId($id) {
        $this->id = $id;
    }

    // Getter pour le titre
    public function getTitre() {
        return $this->titre;
    }

    // Setter pour le titre
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Getter pour le lien
    public function getLien() {
        return $this->lien;
    }

    // Setter pour le lien
    public function setLien($lien) {
        $this->lien = $lien;
    }
}

// Utilisation de la classe
$image = new Image(1, "Titre de l'image", "http://example.com/image.jpg");

// Utilisation des méthodes getter pour obtenir les valeurs des propriétés
echo "ID de l'image : " . $image->getId() . "<br>";
echo "Titre de l'image : " . $image->getTitre() . "<br>";
echo "Lien de l'image : " . $image->getLien() . "<br>";
?>
