<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    //Getter et Setter

    public function GetId()
    {
        return $this->id;
    }

    public function SetId($id)
    {
        $this->id = $id;
    }

    public function GetName()
    {
        return $this ->name;
    }

    public function SetName($name)
    {
        $this->name = $name;
    }

    public function GetDescription()
    {
        return $this->description;
    }

    public function SetDescription($description)
    {
        $this->description = $description;
    }

    public function GetPrice()
    {
        return $this->price;
    }

    public function SetPrice($price)
    {
        $this->price = $price;
    }

    //Méthode CRUD

    public static function getAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM product ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare('INSERT INTO product (name, description, price) VALUES (?, ?, ?)');
        return $stmt->execute([$this->name, $this->description, $this->price]);
    }

    public function update()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare('UPDATE product SET name = ?, description = ?, price = ? WHERE id = ?');
        return $stmt->execute([$this->name, $this->description, $this->price, $this->id]);
    }

    public static function delete($id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare('DELETE FROM product WHERE id = ?');
        return $stmt->execute([$id]);
    }
}