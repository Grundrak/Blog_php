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
    public function getUserById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching user by ID: " . $e->getMessage());
            return false;
        }
    }
    public function getUser($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching user by ID: " . $e->getMessage());
            return false;
        }
    }
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function updateUser($id, $user_name, $email, $password, $avatar, $bio)
    {
        $sql = "UPDATE users SET user_name = ?, email = ?, bio = ?";
        $params = [$user_name, $email, $bio];
    
        if (!empty($password)) {
            $sql .= ", password = ?";
            $params[] = $password;
        }
        if (!empty($avatar)) {
            $sql .= ", avatar = ?";
            $params[] = $avatar;
        }
    
        $sql .= " WHERE id = ?";
        $params[] = $id;
    
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute($params)) {
            error_log('Update failed: ' . implode('; ', $stmt->errorInfo()));
            return false;
        }
        return true;
    }
    // public function authenticateUser($username, $password) {
    //     $sql = "SELECT * FROM users WHERE username = :username";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute(['username' => $username]);
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($user && password_verify($password, $user['password'])) {
    //         return $user; // Return user details if password is correct
    //     } else {
    //         return false; // Return false if authentication fails
    //     }
    // }

}