<?php

require_once './models/User.php';


class Users
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'user_name' => $_POST['user_name'] ?? '',
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'confirm_password' => $_POST['confirm_password'] ?? ''
            ];

            if (empty($data['user_name']) || empty($data['password']) || empty($data['email']) || empty($data['confirm_password'])) {
                echo 'Please fill in all required fields.';
                return;
            }

            if ($data['password'] !== $data['confirm_password']) {
                echo 'Passwords do not match.';
                return;
            }

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($this->userModel->register($data)) {
                setFlash('register_success', 'User registered successfully.');
                header('Location: views/users/login.php');
                exit;
            } else {
                setFlash('register_error', 'Failed to register user.');
                header('Location: views/users/register.php');
                exit;
            }
        } else {
            include 'views/users/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            debugSession();

            if (empty($username) || empty($password)) {
                echo 'Please fill in all credentials.';
                return;
            }

            $user = $this->userModel->getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['id'];
                setFlash('login_success', 'You are now logged in.');
                if ($user["role"] == 'admin') {
                    header('Location: /blog-php/backend/views/admin/dashboard.php');
                } else {
                    header('Location: /blog-php/backend/views/home/home.php');
                }
                exit;
                
            } else {
                $_SESSION['error'] = 'Invalid login credentials';
                setFlash('login_error', 'Invalid credentials.');
                header('Location: views/users/login.php');
                exit;
            }
        } else {
            include 'views/users/login.php';
        }
    }

    public function fetchUsers()
    {
        $users = $this->userModel->getAllUsers();
        error_log("Fetched users: " . print_r($users, true));
        $_SESSION['fetchUsers']=$users;
        header("Location: views/admin/users/index.php");
        exit;
    }
    public function getUserById($id) {
        $user = $this->userModel-> getUserById($id);
        error_log("User fetched: " . print_r($user, true));  

        if ($user) {
            $_SESSION['user']=$user;
            $_SESSION['userName']=$user['user_name'];
            header("Location: views/profil/profil.php");
            exit;
        } else {
            $_SESSION['user'] = null;  
            error_log("No user found with ID: " . $id);
            header("Location: /blog-php/backend/views/profil/profil.php"); 
            exit;
        }
    }
    public function getUser($id) {
        $user = $this->userModel-> getUser($id);
        error_log("User fetched: " . print_r($user, true));  

        if ($user) {
            $_SESSION['userEdit'] = $user;  
            header("Location: /blog-php/backend/views/admin/users/edit.php");
            exit;
        } else {
            echo "No user found with ID";
            // Optionally redirect back to user list or show an error message
        }
    }
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['user_id'];
            $userName = $_POST['user_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $avatar = $_FILES['avatar'] ?? null;
            $bio = $_POST['bio'] ?? '';
            $avatarPath = null;
    
            if (!empty($password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            if ($avatar && $avatar['error'] == UPLOAD_ERR_OK) {
                $avatarPath = '/blog-php/backend/upload/avatar/' . basename($avatar['name']);
                if (!move_uploaded_file($avatar['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $avatarPath)) {
                    setFlash('update_error', 'Failed to upload avatar.');
                    header('Location: views/profil/profil.php');
                    exit;
                }
            }
    
            if ($this->userModel->updateUser($id, $userName, $email, $password, $avatarPath, $bio)) {
                setFlash('update_success', 'Profile updated successfully.');
            } else {
                setFlash('update_error', 'Failed to update profile.');
            }
            header('Location: views/profil/profil.php');
            exit;
        }
    }
    public function deleteUser($id)
    {
        $result = $this->userModel->deleteUser($id);
        if ($result) {
            header("Location: /blog-php/backend/views/admin/users/index.php");
        } else {
            echo "Error deleting user.";
        }
    }

    public function updateUser($id, $userName, $email, $role, $avatar, $bio)
    {
        $result = $this->userModel->updateUser($id, $userName, $email, $role, $avatar, $bio);
        if ($result) {
            header("Location: /blog-php/backend/index.php?regs=updateUser");
        } else {
            echo "Error updating user.";
        }
    }
}
