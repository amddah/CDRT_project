<?php

class Village {
    // Propriétés
    private $id_village;
    private $nom;
    private $x;
    private $y;
    private $pdo;

    // Constructeur
   
    public function __construct($id_village=null, $nom=null, $x=null, $y=null) {
        $this->id_village = $id_village;
        $this->nom = $nom;
        $this->x = $x;
        $this->y = $y;
        $this->pdo = Connection::getInstance()->getConnection();
    }

    // Méthodes

    // Getter pour l'ID
    public function getId() {
        return $this->id_village;
    }

    // Setter pour l'ID
    public function setId($id_village) {
        $this->id_village = $id_village;
    }

    // Getter pour le nom
    public function getNom() {
        return $this->nom;
    }

    // Setter pour le nom
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter pour la coordonnée X
    public function getX() {
        return $this->x;
    }

    // Setter pour la coordonnée X
    public function setX($x) {
        $this->x = $x;
    }

    // Getter pour la coordonnée Y
    public function getY() {
        return $this->y;
    }

    // Setter pour la coordonnée Y
    public function setY($y) {
        $this->y = $y;
    }

    // Ajouter un village à la base de données
    public function ajouterVillage() {
        $stmt = $this->pdo->prepare("INSERT INTO village ( nom, x, y) VALUES ( ?, ?, ?)");
        $stmt->execute([ $this->nom, $this->x, $this->y]);
    }

    // Modifier un village dans la base de données
    public function modifierVillage() {
        $stmt = $this->pdo->prepare("UPDATE village SET nom = ?, x = ?, y = ? WHERE id_village = ?");
        $stmt->execute([$this->nom, $this->x, $this->y, $this->id_village]);
    }

    // Supprimer un village de la base de données
    public function supprimerVillage() {
        $stmt = $this->pdo->prepare("DELETE FROM village WHERE id_village = ?");
        $stmt->execute([$this->id_village]);
    }

    // Afficher un village de la base de données
    public function afficherVillage() {
        $stmt = $this->pdo->query("SELECT * FROM village");
       
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function afficherVillageEtProjet() {
        $stmt = $this->pdo->query("
        SELECT v.* , p.description ,p.id_projet
        FROM village v
        LEFT JOIN projet p ON v.id_village = p.id_village
        ORDER BY v.nom, p.description");
       
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
