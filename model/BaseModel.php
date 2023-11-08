<?php

namespace model;

class BaseModel
{
    protected $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

}