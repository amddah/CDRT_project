<?php


class Projet {
    // Propriétés
    private $id_projet;
    private $description;
    private $pdo;
    private $id_village;

    // Constructeur
    public function __construct($id, $description,$id_village) {
        $this->id_projet = $id;
        $this->description = $description;
        $this->id_village=$id_village;
        $this->pdo = Connection::getInstance()->getConnection();
    }

    // Méthodes

    // Getter pour l'ID
    public function getId() {
        return $this->id_projet;
    }

    // Setter pour l'ID
    public function setId($id) {
        $this->id_projet= $id;
    }

    // Getter pour la description
    public function getDescription() {
        return $this->description;
    }

    // Setter pour la description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Ajouter un projet à la base de données
    public function ajouterProjet() {

        $stmt = $this->pdo->prepare("INSERT INTO projet ( description,id_village) VALUES (?,?)");
        $stmt->execute([$this->description,$this->id_village]);
    }

    // Modifier un projet dans la base de données
    public function modifierProjet() {
        $stmt = $this->pdo->prepare("UPDATE projet SET description = ? WHERE id_projet = ?");
        $stmt->execute([$this->description, $this->id_projet]);
    }

    // Supprimer un projet de la base de données
    public function supprimerProjet() {
        $stmt = $this->pdo->prepare("DELETE FROM projet WHERE id_projet = ?");
        $stmt->execute([$this->id_projet]);
    }

    // Afficher un projet de la base de données
    public function afficherProjet() {
        $stmt = $this->pdo->prepare("SELECT * FROM projet WHERE id = ?");
        $stmt->execute([$this->id_projet]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
