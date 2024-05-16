<?php

require 'config/config_db.php';
require 'controllers/Users.php';
require 'controllers/Comments.php';
require 'controllers/Articles.php';

$request = $_REQUEST['regs'];
$method = $_SERVER['REQUEST_METHOD'];

$commentsController = new Comments();
$articlesController = new Articles();

switch ($request) {
    case '':
        require __DIR__ . '/views/home/home.php';
        break;

    case 'register':
        if ($method == 'GET') {
            require __DIR__ . '/views/users/register.php';
        } elseif ($method == 'POST') {
            echo 'inside register ss';
            $usersController = new Users();
            $usersController->register(); 
        }
        break;

    case 'createComment':
        if ($method == 'POST') {
            $commentsController->createComment($_POST);
        } 
        break;

    case 'readComments':
        if ($method == 'GET') {
            $commentsController->getCommentsofArticle($_GET['article_id']);
        } 
        break;  
        
    case 'getCommentById':
        if ($method == 'GET') {
            $commentsController->getCommentById($_GET['id']);
        } 
        break;    

    case 'updateComment':
        if ($method == 'POST') {
            $commentsController->updateComment($_POST['id'], $_POST['content']);
        }  
        break;  

    case 'deleteComment':
        if ($method == 'POST') {
            $commentsController->deleteComment($_POST['id']);
        }
        break;  
        
    case 'createArticle':
        if ($method == 'POST') {
            $articlesController->createArticle($_POST['title'], $_POST['content'], $_POST['user_id']);
        }
        break;
    default:
        break;    
}