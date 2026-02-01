<?php
include_once '../database/databaseConnection.php';
include_once '../interface/IProductRepository.php';

class ProductRepository implements IProductRepository
{
    private $connection;

    function __construct()
    {
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }

    public function insertProduct($product)
    {
        $conn = $this->connection;

        $sql = "INSERT INTO product (name, description, price, quantity)
                VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getQuantity()
        ]);
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        return $this->connection->query($sql)->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function updateProduct($id, $name, $description, $price, $quantity)
    {
        $sql = "UPDATE product
                SET name=?, description=?, price=?, quantity=?
                WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$name, $description, $price, $quantity, $id]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
    }
}