<?php

namespace app\Model;

use app\Lib\Registry;

class ProductModel
{
    private $id;

    private $title;

    private $category;

    private $price;

    private $count;

    /**
     * ProductModel constructor.
     * @param $id
     * @param $title
     * @param $category
     * @param $price
     * @param $count
     */
    public function __construct($id, $title, $category, $price, $count)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->price = $price;
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * TODO: work with decimal here
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    public function save()
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        if ($this->id === null) {
            // INSERT
            $stmt = $pdo->prepare(
                'INSERT INTO `product` (title, category, price, count) VALUES (?, ?, ?, ?)'
            );
            $stmt->bindParam(1, $this->title, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->category, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->price, \PDO::PARAM_INT);
            $stmt->bindParam(4, $this->count, \PDO::PARAM_INT);

            return $stmt->execute();

        } else {
            $stmt = $pdo->prepare(
                'UPDATE `product` SET title = ?, category = ?, price = ?, `count` = ? WHERE id = ?'
            );
            $stmt->bindParam(1, $this->title, \PDO::PARAM_STR);
            $stmt->bindParam(2, $this->category, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->price, \PDO::PARAM_INT);
            $stmt->bindParam(4, $this->count, \PDO::PARAM_INT);
            $stmt->bindParam(5, $this->id, \PDO::PARAM_STR);

            return $stmt->execute();
        }
    }

    public static function findById($id)
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        if ($row = $stmt->fetch()) {
            return self::createProductFromArray($row);
        }

        return null;
    }

    public static function deleteById($id)
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->prepare("DELETE FROM product WHERE id = ?");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function findAll()
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->query("SELECT * FROM product");

        $products = [];

        foreach ($stmt->fetchAll() as $row) {
            $products[] = self::createProductFromArray($row);
        }

        return $products;
    }

    private static function createProductFromArray(array $row)
    {
        return new ProductModel(
            $row['id'],
            $row['title'],
            $row['category'],
            $row['price'],
            $row['count']
        );
    }
}