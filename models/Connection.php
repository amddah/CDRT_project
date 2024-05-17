<?php

use FTP\Connection as FTPConnection;

class Connection {
    // Information de connexion à la base de données
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "cdrt_project";

    // Propriété statique pour stocker l'instance unique de la classe
    private static $instance = null;

    // Propriété pour stocker l'objet PDO
    private $pdo;

    // Constructeur privé pour empêcher l'instanciation directe de la classe
    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        // Création d'une nouvelle instance PDO
        $this->pdo = new PDO($dsn, $this->username, $this->password);

        // Définition des attributs PDO pour générer des exceptions lors d'erreurs
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Méthode statique pour obtenir l'instance unique de la classe (singleton)
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    // Méthode pour obtenir l'objet PDO
    public function getConnection() {
        return $this->pdo;
    }

    // Empêcher le clonage de l'instance de la classe (singleton)
    public function __clone() {}

    // Empêcher la désérialisation de l'instance de la classe (singleton)
    public function __wakeup() {}
}

// Utilisation de la classe singleton pour obtenir la connexion à la base de données
$db = Connection::getInstance();
$pdo = $db->getConnection();


?>
