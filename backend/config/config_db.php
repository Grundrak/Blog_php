<?php
class Database
{

    private  $host = 'localhost';
    private $dbname = 'blog_db';
    private $username = 'root';
    private $password = 'Ab20182018';
    private $dbh;
    private $stmt;
    private $error;
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOEXCEPTION $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function query($sql){
        $this->stmt = $this ->dbh -> prepare($sql);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute() {
        return $this->stmt->execute();
    }
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount() {
        return $this->stmt->rowCount();
    }
    public function prepare($sql) {
        return $this->dbh->prepare($sql);
    }
//     public function createTablesFromFile($filePath) {
//         try {
//             $sql = file_get_contents($filePath);
//             $this->dbh->exec($sql);
//             echo "Les tables ont été créées avec succès.";
//         } catch (PDOException $e) {
//             exit("Erreur lors de la création des tables : " . $e->getMessage());
//         }
//     }     
// }

// $database = new Database();
// $database->createTablesFromFile('../database/Tables.sql');

}