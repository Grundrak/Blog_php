<?php

require_once 'config/config_db.php';
require_once  'helpers/session.php';
require_once 'controllers/Users.php';


$request = $_REQUEST['regs'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

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
    default:
        // redirect('404.php');
        break;
}
