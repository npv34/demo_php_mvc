<?php

namespace model;

use PDO;
use PDOException;

class DBConnect
{
    private $dns;

    private $usename;

    private $password;

    public function __construct()
    {
        $this->dns = "mysql:host=127.0.0.1;dbname=eshop_db";
        $this->usename = "root";
        $this->password = "123456@Abc";
    }

    function connect() {
        try {
            $conn = new PDO($this->dns, $this->usename, $this->password);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        return $conn;
    }
}