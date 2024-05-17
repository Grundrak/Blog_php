<?php

require_once './models/Article.php';

class Articles {
    private $articlesModel;


    public function __construct() {
        $this->articlesModel = new Article();

    }

    public function createArticle($data) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'] ?? '',
                'content' => $_POST['content'] ?? '',
                'user_id' => $_POST['user_id'] ?? 0
            ];

            if (empty($data['title']) || empty($data['content']) || empty($data['user_id'])) {
                echo "Empty fields";
                return;
            }

            if ($this->articlesModel->createArticle($data)) {
                echo "Article created successfully";
            } else {
                echo "Failed to create article";
            }
        } else {
            include './views/articles/articles.php';
        }
    }

    public function getArticles() {

        try {
            $articles = $this->articlesModel->getArticles();
    
            if (empty($articles)) {
                echo "No articles available.";
            } else {
                $_SESSION['getArticles']=$articles;
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


