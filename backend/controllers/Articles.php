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
        $articles = $this->articlesModel->getArticles();
        return $articles;
    }
}