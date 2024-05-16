<?php
require_once  './config/config_db.php';

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
            $stmt->bindParam(':password', $data['password']);

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
    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE user_name = :username");
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $row;
    }
    public function getAllUsers()
    {
        try {
            $stmt = $this->db->prepare('SELECT id, user_name, email, role, avatar, bio FROM users');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);  
            return $result;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateUser($id, $userName, $email, $role, $avatar, $bio)
    {
        $stmt = $this->db->prepare("UPDATE users SET user_name = ?, email = ?, role = ?, avatar = ?, bio = ? WHERE id = ?");
        return $stmt->execute([$userName, $email, $role, $avatar, $bio, $id]);
    }
}
