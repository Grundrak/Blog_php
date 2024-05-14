<?php

require_once './models/Comment.php';

class Comments
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function createComment($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'content' => $_POST['content'] ?? '',
                'user_id' => $_POST['user_id'] ?? 0, 
                'article_id' => $_POST['article_id'] ?? 0
            ];
    
            if (empty($data['content']) || empty($data['user_id']) || empty($data['article_id'])) {
                echo "Empty fields.";
                return;
            }
    
            if ($this->commentModel->createComment($data)) {
                echo "Comment created successfully.";
            } else {
                echo "Failed to create comment.";
            }
        } else {
            include './views/comments/comments.php';
        }
    }

    public function getCommentsofArticle($article_id)
    {
        $comments = $this->commentModel->getCommentsofArticle($article_id);

        include './views/comments/comments.php';
    }

    public function getCommentById($id)
    {
        $comment = $this->commentModel->getCommentById($id);

        if ($comment) {
            echo 'ID: ' . $comment['id'] . '<br>';
            echo 'Content: ' . $comment['content'] . '<br>';
            echo 'User ID: ' . $comment['user_id'] . '<br>';
            echo 'Article ID: ' . $comment['article_id'] . '<br>';
            return $comment['id'];
        }
         else {
            echo "Comment not found.";
        }
    }

    public function updateComment($id, $content)
    {
        // $comment = $this->commentModel->getCommentById($id);
        if (true) {
            if ($this->commentModel->updateComment($id, $content)) {
                echo "Comment updated successfully.";
            } else {
                echo "Failed to update comment.";
            }
        } else {
            echo "Comment not found.";
        }
    }

    public function deleteComment($id)
    {
        // $comment = $this->commentModel->getCommentById($id);
        if (true) {
            if ($this->commentModel->deleteComment($id)) {
                echo "Comment deleted successfully.";
            } else {
                echo "Failed to delete comment.";
            }
        } else {
            echo "Comment not found.";
        }
    }
}
