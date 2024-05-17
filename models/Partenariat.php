<?php

class Partenariat {
    // Propriétés
    private $id;
    private $nom;
    private $logo;

    // Constructeur
    public function __construct($id, $nom, $logo) {
        $this->id = $id;
        $this->nom = $nom;
        $this->logo = $logo;
    }

    // Getter pour l'ID
    public function getId() {
        return $this->id;
    }

    // Setter pour l'ID
    public function setId($id) {
        $this->id = $id;
    }

    // Getter pour le nom
    public function getNom() {
        return $this->nom;
    }

    // Setter pour le nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter pour le logo
    public function getLogo() {
        return $this->logo;
    }

    // Setter pour le logo
    public function setLogo($logo) {
        $this->logo = $logo;
    }
}

// Utilisation de la classe
$partenariat = new Partenariat(1, "Nom du partenariat", "logo.png");

// Utilisation des méthodes getter pour obtenir les valeurs des propriétés
echo "ID du partenariat : " . $partenariat->getId() . "<br>";
echo "Nom du partenariat : " . $partenariat->getNom() . "<br>";
echo "Logo du partenariat : " . $partenariat->getLogo() . "<br>";
?>
