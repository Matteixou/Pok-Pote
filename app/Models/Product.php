<?php

// Déclare l'espace de noms pour les Models
namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    // =====================
    // Getters / Setters
    // =====================

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // =====================
    // Méthodes CRUD
    // =====================

    /**
     * Récupère tous les produits
     * @return array
     */
    public static function getAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM product ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un produit par son ID
     * @param int $id
     * @return array|null
     */
    public static function findById($id)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée un nouveau produit
     * @return bool
     */
    public function save()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("INSERT INTO product (name, description, price) VALUES (?, ?, ?)");
        return $stmt->execute([$this->name, $this->description, $this->price]);
    }

    /**
     * Met à jour les informations d'un produit existant
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("UPDATE product SET name = ?, description = ?, price = ? WHERE id = ?");
        return $stmt->execute([$this->name, $this->description, $this->price, $this->id]);
    }

    /**
     * Supprime un produit
     * @return bool
     */
    public function delete()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM product WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    /**
     * Supprime tous les produits
     * @return bool
     */
    public static function deleteAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM product");
        return $stmt->execute();
    }
}
