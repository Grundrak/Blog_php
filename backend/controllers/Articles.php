<?php

require_once './models/Article.php';

class Articles {
    private $articlesModel;


    public function __construct() {
        $this->articlesModel = new Article();

    }

    public function createArticle() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if user is logged in and get user_id from session
            if (!isset($_SESSION['user_id'])) {
                echo "Please log in to create an article.";
                return;
            }
    
            $data = [
                'title' => $_POST['title'] ?? '',
                'content' => $_POST['content'] ?? '',
                'user_id' => $_SESSION['user_id'],  
                'image' => $_FILES['articleImage'] ?? null
            ];
    
            if (empty($data['title']) || empty($data['content'])) {
                echo "Title and content are required.";
                header('Location: views/admin/articles/index.php');
                return;
            }
    
            $imagePath = $this->uploadImage($data['image']);
            if ($imagePath) {
                $data['image'] = $imagePath;
            } else {
                echo "Image upload failed";
                return;
            }
    
            if ($this->articlesModel->createArticle($data)) {
                echo "Article created successfully";
            } else {
                echo "Failed to create article";
            }
        } else {
            include 'views/articles/articles.php';
        }
    }

    private function uploadImage($file) {
        if ($file && $file['error'] == UPLOAD_ERR_OK) {
            $targetDir = "/blog-php/backend/upload/articel/"; 
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

    public function getArticles() {

        try {
            $articles = $this->articlesModel->getArticles();
    
            if (empty($articles)) {
                echo "No articles available.";
            } else {
                $_SESSION['fetchArticles']=$articles;
                include 'views/articles/articles.php';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function editArticle($id) {
        if (!$id || !is_numeric($id)) {
            echo "Invalid article ID";
            return;
        }

        $article = $this->articlesModel->getArticleById($id);

        if (!$article) {
            echo "Article not found";
            return;
        }

        include './views/articles/edit_article.php'; // Assuming there's an edit_article.php view
    }

    public function updateArticle($data) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $data = [
                'title' => $_POST['title'] ?? '',
                'content' => $_POST['content'] ?? '',
                'user_id' => $_POST['user_id'] ?? 0
            ];

            if (empty($id) || empty($data['title']) || empty($data['content']) || empty($data['user_id'])) {
                echo "Empty fields";
                return;
            }

            if ($this->articlesModel->updateArticle($id, $data)) {
                echo "Article updated successfully";
            } else {
                echo "Failed to update article";
            }
        } else {
            include './views/articles/edit_article.php'; // Assuming there's an edit_article.php view
        }
    }

    public function deleteArticle($id) {
        if (!$id || !is_numeric($id)) {
            echo "Invalid article ID";
            return;
        }

        if ($this->articlesModel->deleteArticle($id)) {
            echo "Article deleted successfully";
        } else {
            echo "Failed to delete article";
        }
    }
}


