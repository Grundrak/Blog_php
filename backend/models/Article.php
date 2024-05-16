<?php

require_once './config/config_db.php';

class Article {
    private $db;

    private $stmt;

    public function __construct() {
        $this->db = new Database();
    }

    public function createArticle($data) {
        try {
            $sql = "INSERT INTO articles (title, content, user_id) VALUES (:title, :content, :user_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':content', $data['content']); 
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log('Create article error: ' . $e->getMessage());
            return false;
        }
    }

    public function getArticles() {
        try {
            $sql = "SELECT * FROM articles";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Get articles error: ' . $e->getMessage());
            return [];
        }
    }

    
}
