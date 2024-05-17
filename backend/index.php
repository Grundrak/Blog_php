<?php



require_once 'config/config_db.php';
require_once  'helpers/session.php';
require_once 'controllers/Users.php';
require_once 'controllers/Comments.php';
require_once 'controllers/Articles.php';


$request = $_REQUEST['regs'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];


$commentsController = new Comments();
$articlesController = new Articles();


switch ($request) {
    case '':

        require_once 'views/home/home.php';

        break;

    case 'register':
        if ($method == 'GET') {

            require_once 'views/users/register.php';
        } elseif ($method == 'POST' && $request == 'register') {

            echo 'inside register ss';
            $usersController = new Users();
            $usersController->register();
        }
        break;

    case 'login':
        if ($method == 'GET') {
            require_once 'views/users/login.php';
        } elseif ($method == 'POST' && $request == 'login') {
            $usersController = new Users();
            $usersController->login();
        }
        break;
    case 'fetchUsers':
        if ($method == 'GET') {
            $usersController = new Users();
            $usersController->fetchUsers();
        }
        break;
    case 'fetchUser':

        $usersController = new Users();
        echo 'process fetch user';
        $usersController->getUserById($_SESSION['user_id']);


        break;
    case 'editUser':
        
            $user_id = intval($_GET['id']);
            $usersController = new Users();
            $usersController->updateUser($user_id);
        
        break;


    case 'deleteUser':

        $userId = intval($_GET['id']);
        $usersController = new Users();
        $usersController->deleteUser($userId);

        break;
    case 'updateProfil':

        $usersController = new Users();
        $usersController->updateProfile();

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
            $articlesController->createArticle();
        }
        break;

    case 'getArticles':
        if ($method == 'GET') {
            $articlesController->getArticles();
        }
        break;
    case 'deleteArticle':
        $articleId = intval($_GET['id']);
        $articlesController->deleteArticle($articleId);

        break;
    case 'fetchArticle':
        $articleId = intval($_GET['id']);
        $articlesController->getArticleById($articleId);

        break;
        case 'editArticle':
            $articleId = intval($_GET['id']);
            $articlesController->updateArticle($articleId);
    
            break;

    default:
        break;
}
