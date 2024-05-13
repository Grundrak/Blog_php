<?php
require_once './models/User.php';
require_once 'Users.php';

$usersController = new Users();
$usersController->register();