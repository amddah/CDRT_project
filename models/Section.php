<?php

class Section {
    // Propriétés
    private $id_desc;
    private $titre;
    private $text;
    private $image;
    private $id_projet;
    private $pdo;

    // Constructeur
    public function __construct($id_desc = null, $titre = null, $text = null, $image = null, $id_projet = null) {
        $this->id_desc = $id_desc;
        $this->titre = $titre;
        $this->text = $text;
        $this->image = $image;
        $this->id_projet = $id_projet;
        $this->pdo = Connection::getInstance()->getConnection();
    }

    // Getter pour l'ID
    public function getIdDesc() {
        return $this->id_desc;
    }

    // Setter pour l'ID
    public function setIdDesc($id_desc) {
        $this->id_desc = $id_desc;
    }

    // Getter pour le titre
    public function getTitre() {
        return $this->titre;
    }

    // Setter pour le titre
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Getter pour le texte
    public function getText() {
        return $this->text;
    }

    // Setter pour le texte
    public function setText($text) {
        $this->text = $text;
    }

    // Getter pour l'image
    public function getImage() {
        return $this->image;
    }

    // Setter pour l'image
    public function setImage($image) {
        $this->image = $image;
    }

    // Getter pour l'ID du projet
    public function getIdProjet() {
        return $this->id_projet;
    }

    // Setter pour l'ID du projet
    public function setIdProjet($id_projet) {
        $this->id_projet = $id_projet;
    }

    // Ajouter une section à la base de données
    public function ajouterSection() {
        $stmt = $this->pdo->prepare("INSERT INTO section (titre, text, image, id_projet) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->titre, $this->text, $this->image, $this->id_projet]);
    }

    // Modifier une section dans la base de données
    public function modifierSection() {
        $stmt = $this->pdo->prepare("UPDATE section SET titre = ?, text = ?, image = ?, id_projet = ? WHERE id_desc = ?");
        $stmt->execute([$this->titre, $this->text, $this->image, $this->id_projet, $this->id_desc]);
    }

    // Supprimer une section de la base de données
    public function supprimerSection() {
        $stmt = $this->pdo->prepare("DELETE FROM section WHERE id_desc = ?");
        $stmt->execute([$this->id_desc]);
    }

    // Afficher une section de la base de données
    public function afficherSections() {
        $stmt = $this->pdo->query("SELECT * FROM section");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
