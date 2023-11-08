<?php

namespace controller;

use model\Product;

class HomeController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    function showHomePage() {
        // goi model
        $products = $this->productModel->getAll();
        include_once "./view/home.php";
    }

    function deleteProduct($idProduct) {
        // goi model thuc thi xoa
        try {
            $this->productModel->delete($idProduct);
            // quay tro lai index
            header('Location: index.php?page=home');
        }catch (\Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}