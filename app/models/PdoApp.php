<?php

/**
* Classe PDO qui va me permettre de réaliser des requêtes sur la base de données
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

class PdoApp
{
    private $serveur;
    private $bdd;
    private $user;
    private $mdp;
    private $instancePdo;

    /* Getters */
    public function getInst(){
        return $this->instancePdo;
    }

    public function __construct()
    {
        try {
            $ini = parse_ini_file(dirname(dirname(__DIR__)) . '/app.ini');

            $this->user = $ini['db_user'];
            $this->mdp = $ini['db_password'];
            $this->serveur = $ini['db_host'];
            $this->bdd = $ini['db_name'];

            // On se connecter à la base si elle existe 
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur . ';' . 'dbname=' . $this->bdd, $this->user, $this->mdp);

            $this->instancePdo->query("SET CHARACTER SET utf8");
        }catch (PDOException $e)
        {
            // On se connecte au serveur
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur . ';' . $this->user, $this->mdp);

            // On créer la base de données car elle n'existe pas
            $this->initDbIfNotExists();

            // On se connecter à la base de données
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur . ';    "' . 'dbname=' . $this->bdd, $this->user, $this->mdp);

            $e->getMessage();
        }
    }

    /**
    * Permet de réinitialiser la base de données
    *
    * @param bool $force Permet de forcer la réinitialisation même si la base de données existe déjà    
    * 
    * @return bool True en cas d'initialisation
    *
    * @access private
    */
    private function initDbIfNotExists(bool $force = false){
        if (!$this->dbExists($this->bdd) || $force){
            $query = file_get_contents(dirname(dirname(__DIR__)) . "bdd.sql");
            $stmt = $this->instancePdo->prepare($query);
            if($stmt->execute()){
                return 1;
            };
        };
        return -1; // Bdd non créée 
    }

    /**
    * Permet de vérifier que la base de données existe
    *
    * @param string $dbname Nom de la base de données 
    * 
    * @return bool True si la base de données existe, False si elle n'existe pas 
    *
    * @access private
    */
    private function dbExists($dbname){
        try {
            // $query = sprintf("SELECT COUNT(*) FROM information_schema.schemata WHERE schema_name = '%s'", $dbname);
            $query = "SHOW DATABASES LIKE '$dbname'";

            $stmt = $this->instancePdo->prepare($query);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                // echo "La base de données existe.";
                return 1;
            } else {
                // echo "La base de données n'existe pas.";
                return 0;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Récupérer les catégories
     */
    public function getCategories(){
        $query = 'SELECT libelle, cat FROM categories';
        $stmt = $this->instancePdo->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll();

        return $res;
    }

    /**
     * Récupérer les contenus
     */
    public function getFilms(){
        $query = 'SELECT libelle, cat FROM films as c INNER JOIN categories as f ON f.cat = c.cat';
        $stmt = $this->instancePdo->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll();

        return $res;
    }
}