<?php

require_once './models/Article.php';

class Articles
{
    private $articlesModel;

    public function __construct()
    {
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
                exit;
            }
    
            $newArticleId = $this->articlesModel->createArticle($data['title'], $data['content'], $data['image']);
            if ($newArticleId) {
                $newArticle = $this->articlesModel->getArticleById($newArticleId);
                $this->updateSessionArticlesAfterCreation($newArticle);
                header("Location: /blog-php/backend/views/admin/articles/index.php");
                exit;
            } else {
                echo "Failed to create article";
            }
        } else {
            include 'views/articles/articles.php';
        }
    }
    private function updateSessionArticlesAfterCreation($newArticle) {
        if (isset($_SESSION['getArticles'])) {
            array_push($_SESSION['getArticles'], $newArticle);
        } else {
            $_SESSION['getArticles'] = [$newArticle];  // Initialize if not already set
        }
        // Debugging output
        error_log('Updated session articles: ' . print_r($_SESSION['getArticles'], true));
    }
    public function getArticles()
    {
        try {
            $articles = $this->articlesModel->getArticles();
            if (empty($articles)) {
                echo "No articles available.";
            } else {

                $_SESSION['getArticles']=$articles;
                header("Location: views/articles/articles.php");

            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getArticleById($id)
    {
        $article = $this->articlesModel->getArticleById($id);
        if ($article) {
            $_SESSION['articleEd'] = $article;
            header("Location: /blog-php/backend/views/admin/articles/edit.php");
            exit;
        } else {
            echo "No article found with ID: $id";
            return null;
        }
    }

    public function updateArticle($id)
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $image = $_FILES['articleImage'] ?? null;
        $imagePath = null;

        if ($image && $image['error'] == UPLOAD_ERR_OK) {
            $safeName = basename($image['name']);
            $safeName = preg_replace("/[^a-zA-Z0-9.]/", "_", $safeName);
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/blog-php/backend/upload/article/';
            $imagePath = $targetDir . $safeName;

            if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
                echo 'Failed to create directory for image.';
                header('Location: views/admin/articles/index.php');
                exit;
            }

            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo 'Failed to upload image.';
                header('Location: views/admin/articles/index.php');
                exit;
            }
        }

        if ($this->articlesModel->updateArticle($id, $title, $content, $imagePath)) {
            $updatedArticle = $this->articlesModel->getArticleById($id);
            $this->updateSessionArticlesAfterEdit($id, $updatedArticle);
            header('Location: views/admin/articles/index.php');
            exit;
        } else {
            echo 'Failed to update article.';
            header('Location: views/admin/articles/index.php');
            exit;
        }
    }

    private function updateSessionArticlesAfterEdit($id, $updatedArticle)
    {
        if (isset($_SESSION['getArticles'])) {
            $_SESSION['getArticles'] = array_map(function ($article) use ($id, $updatedArticle) {
                if ($article['id'] == $id) {
                    return $updatedArticle;
                }
                return $article;
            }, $_SESSION['getArticles']);
        }
    }

    public function deleteArticle($id)
    {
        if (!$id || !is_numeric($id)) {
            echo "Invalid article ID";
            return;
        }

        if ($this->articlesModel->deleteArticle($id)) {
            echo "Article deleted successfully";
            $this->updateSessionArticlesAfterDeletion($id);
            header('Location: views/admin/articles/index.php');
            exit;
        } else {
            echo "Failed to delete article";
        }
    }

    private function updateSessionArticlesAfterDeletion($id)
    {
        if (isset($_SESSION['getArticles'])) {
            $_SESSION['getArticles'] = array_filter($_SESSION['getArticles'], function ($article) use ($id) {
                return $article['id'] != $id;
            });
        }
    }
}
