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
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST' )  {
            $data = [
                'user_name' => $_POST['user_name'] ?? '',
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];

            echo "<pre>" . print_r($data, true) . "</pre>";

            if (empty($data['user_name']) || empty($data['password']) || empty($data['email'])) {
                echo "Empty fields.";
                return;
            }

            if ($this->userModel->register($data)) {
                echo "User registered successfully.";
            } else {
                echo "Failed to register user.";
            }
        } else {
            include '../views/users/register.php';
        }
    }
}
