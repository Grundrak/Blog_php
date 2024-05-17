<?php
// require_once 'session.php'; 
// require_once '../models/User.php';
// require_once '../config/config_db.php';

// $userModel = new User($dbh);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'] ?? '';
//     $password = $_POST['password'] ?? '';

//     $userDetails = $userModel->authenticateUser($username, $password);
//     if ($userDetails) {
//         $_SESSION['logged_in'] = 1;
//         $_SESSION['user'] = [
//             'user_name' => $userDetails['user_name'],
//             'avatar' => $userDetails['avatar'] ?? null
//         ];
//         header('Location: /blog-php/backend/views/home/home.php');
//         exit;
//     } else {
//         setFlash('error', 'Invalid username or password');
//         header('Location: login.php');
//         exit;
//     }
// }