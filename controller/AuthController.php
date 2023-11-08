<?php

namespace controller;

use model\User;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    function showLoginPage() {
        include_once "./view/login.php";
    }

    function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->showLoginPage();
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->userModel->getUser($email, $password);

            if (count($result) > 0) {
                header('Location: index.php?page=home');
            } else {
                echo "Account not found";
            }
        }
    }
}