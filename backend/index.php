<?php

require 'config/config_db.php';
require 'controllers/Users.php';


$request = $_REQUEST['regs'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case '':
        require __DIR__ . '/viewss/home.php';
        break;
    case 'register':
        if ($method == 'GET') {
            require __DIR__ . '/viewss/users/register.php';
        } elseif ($method == 'POST'  ) {
            echo 'inside register ss';
            $usersController = new Users();
            $usersController->register(); 
        }
        break;
    default:
        break;
}
