<?php

require_once './config/config_db.php';

class Comment {
    private $db;

    private $stmt;

    public function __construct() {
        $this->db = new Database();
    }

    public function createComment($data) {
        try {
            $sql = "INSERT INTO comments (content, user_id, article_id) VALUES (:content, :user_id, :article_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':user_id', $data['user_id']);
            $stmt->bindParam(':article_id', $data['article_id']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log('Create comment error: ' . $e->getMessage());
            return false;
        }
    }

    public function getCommentsofArticle($article_id) {
        try {
            $sql = "SELECT * FROM comments WHERE article_id = :article_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':article_id', $article_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Get comments error: ' . $e->getMessage());
            return [];
        }
    }

    public function getCommentById($id)
    {
        try {
            $sql = "SELECT * FROM comments WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Get comment by ID error: ' . $e->getMessage());
            return null;
        }
    }

    public function updateComment($id, $content) {
        try {
            $sql = "UPDATE comments SET content = :content WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log('Update comment error: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteComment($id) {
        try {
            $sql = "DELETE FROM comments WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log('Delete comment error: ' . $e->getMessage());
            return false;
        }
    }
}
