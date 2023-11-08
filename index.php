<?php

include_once "controller/AuthController.php";
include_once "controller/HomeController.php";
include_once "entity/User.php";
include_once "model/BaseModel.php";
include_once "model/DBConnect.php";
include_once "model/User.php";
include_once "entity/Product.php";
include_once "model/Product.php";


use controller\AuthController;
use controller\HomeController;



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    $page = $_GET['page'] ?? null;
    $action = $_GET['action'] ?? null;

    $authController = new AuthController();
    $homeController = new HomeController();

    if (!$page) {
        echo '<a href="index.php?page=login">Login</a>';
    }

    switch ($page) {
        case 'login':
            $authController->login();
            break;
        case 'home':
            if ($action == 'delete') {
                $id = $_GET['pId'];
                $homeController->deleteProduct($id);
            } else {
                $homeController->showHomePage();
            }


            break;
    }
?>


</body>
</html>
