<?php

namespace model;

class User extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function getUser($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // ap dung ky thuat ORM
        $data = [];

        foreach ($result as $row){
            $user = new \entity\User($row['name'], $row['email']);
            $user->setId($row['id']);
            $data[] = $user;
        }

        return $data;
    }

}