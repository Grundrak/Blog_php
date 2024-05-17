<?php

require_once './models/Article.php';

class Articles {
    private $articlesModel;

    public function __construct() {
        $this->articlesModel = new Article();
    }

    public function createArticle() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            if ($this->articlesModel->createArticle($data['title'], $data['content'], $data['image'])) {
                echo "Article created successfully";
            } else {
                echo "Failed to create article";
            }
        } else {
            include 'views/articles/articles.php';
        }
    }

    public function getArticles() {
        try {
            $articles = $this->articlesModel->getArticles();
            if (empty($articles)) {
                echo "No articles available.";
            } else {
                $_SESSION['fetchArticles'] = $articles;
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

        include './views/articles/edit_article.php';
    }

    public function updateArticle() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $data = [
                'title' => $_POST['title'] ?? '',
                'content' => $_POST['content'] ?? '',
                'image' => $_FILES['articleImage'] ?? null
            ];

            if (empty($id) || empty($data['title']) || empty($data['content'])) {
                echo "Empty fields";
                return;
            }

            if ($this->articlesModel->updateArticle($id, $data['title'], $data['content'], $data['image'])) {
                echo "Article updated successfully";
            } else {
                echo "Failed to update article";
            }
        } else {
            include './views/articles/edit_article.php';
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