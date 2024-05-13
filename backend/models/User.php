<?php
require_once './config/config_db.php';

class User
{
    private $db;

    private $stmt;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
{
    try {
        echo "Preparing statement...\n";
        $stmt = $this->db->prepare('INSERT INTO users (user_name, first_name, last_name, email, password) VALUES (:user_name, :first_name, :last_name, :email, :password)');
        echo "Binding parameters...\n";
        $stmt->bindParam(':user_name', $data['user_name']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password',$data['password']);

        echo "Executing statement...\n";
        $stmt->execute();
        echo "Execution successful.\n";
        return true;
    } catch (PDOException $e) {
        echo "Caught exception: " . $e->getMessage() . "\n";
        error_log('Registration error: ' . $e->getMessage());
        return false;
    }
}

}
