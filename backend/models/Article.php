<?php

require_once './config/config_db.php';

class Article {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createArticle($title, $content, $file) {
        $imagePath = $this->uploadImage($file);
        $sql = "INSERT INTO articles (title, content, image_path) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$title, $content, $imagePath]);
    }

    public function updateArticle($id, $title, $content, $file) {
        $imagePath = $this->uploadImage($file);
        $sql = "UPDATE articles SET title = ?, content = ?";
        $params = [$title, $content];

        if ($imagePath) {
            $sql .= ", image_path = ?";
            $params[] = $imagePath;
        }

        $sql .= " WHERE id = ?";
        $params[] = $id;

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function getArticles() {
        $sql = "SELECT * FROM articles";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM articles WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteArticle($id) {
        $sql = "DELETE FROM articles WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    private function uploadImage($file) {
        if ($file && $file['error'] == UPLOAD_ERR_OK) {
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/blog-php/backend/upload/article/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $filename = basename($file['name']);
            $safeFilename = preg_replace("/[^a-zA-Z0-9.\-_]/", "_", $filename);
            $targetFile = $targetDir . $safeFilename;
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $targetFile;
            }
        }
        return null;
    }
}