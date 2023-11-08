<?php

namespace model;

class Product extends BaseModel
{
    function getAll() {
        $sql = "SELECT * FROM products";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();

        // ap dung ky thuat ORM
        $data = [];
        $result = $stmt->fetchAll();
        foreach ($result as $item) {
            $product = new \entity\Product($item['pName'], $item['pPrice']);
            $product->setId($item['pID']);
            $data[] = $product;
        }
        return $data;
    }

    function delete($id) {
        $sql = "DELETE FROM products WHERE pID =?";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
}