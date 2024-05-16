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
            $sql = "INSERT INTO articles (title, content, user_id, image_path) VALUES (:title, :content, :user_id, :image_path)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->bindParam(':image_path', $data['image']);
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

            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $articles ?: [];
        } catch (PDOException $e) {
            throw new Exception('Get articles error: ' . $e->getMessage());
        }
    }

    public function updateArticle($id, $data) {
        try {
            $sql = "UPDATE articles SET title = :title, content = :content, user_id = :user_id WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception('Update article error: ' . $e->getMessage());
        }
    }

    public function deleteArticle($id) {
        try {
            $sql = "DELETE FROM articles WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception('Delete article error: ' . $e->getMessage());
        }
    }
}