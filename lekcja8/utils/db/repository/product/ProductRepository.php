<?php

class ProductRepository {

    public $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {
        $statement = $this->pdo->prepare("SELECT * from product");

        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_CLASS, "Product");

        return $users;
    }

    function deleteOneById(int $id): void {
        
        $statement = $this->pdo->prepare("DELETE from product WHERE id = :id");
        $statement->execute(['id' => $id]);
    }

    function findOneById(int $id): Product {
        $statement = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $statement->execute(['id' => $id]);

        $user = $statement->fetchObject("Product");
        return $user ? $user : [];
    }

    function insertOne(Product $product): Product {
        $productParams = [
            'name' => $product->name,
            'category_id' => $product->category_id,
            'cost' => $product->cost
        ];

        $statement = $this->pdo->prepare("
            INSERT INTO product (name, category_id, cost)
            VALUES (:name, :category_id, :cost) 
        ");


        $statement->execute($productParams);
        $product->id = (int) $this->pdo->lastInsertId();
        return $product;
    }

    function updateOne(Product $product): Product {

        if (!$product->id) {
            throw new Exception('Product::updateOne error. Product must have id');
        }

        $productParams = [
            'id' => $product->id,
            'name' => $product->name,
            'category_id' => $product->category_id,
            'cost' => $product->cost
        ];

        $statement = $this->pdo->prepare("
            UPDATE product SET
                name = :name,
                category_id = :category_id,
                cost = :cost
            WHERE id = :id
        ");


        $statement->execute($productParams);

        return $product;
    }

}
