<?php

/* 
 * Oskar
 * Wzorując się na pliku: lekcja8/utils/db/repository/product/ProductRepository.php
 * Utwórz repozytorium dla UserRepository ktory zaimplementuje interface CategoryRepositoryInterface oraz wszystkie jego metody
 */

class UserRepository{
  
    public $pdo;
    
    public function __construct(PDO $pdo)
            {
                $this->pdo = $pdo;
            }
        
    public function findOneById(int $id): ?UserInterface
    {
        $statement = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $statement->execute(['id' => $id]);

        $rawUser = $statement->fetch();

        return $rawUser? $this->hydrate($rawUser): null;
    }
    
    protected function hydrate(array $rawUser): UserInterface{
        $user = new User(
                (string)$rawUser['first_name'],
                (string)$rawUser['last_name'],
                (string)$rawUser['email'],
                (string)$rawUser['city'],
                (string)$rawUser['role'],
                (string)$rawUser['password']
        );
        $user->setId($rawUser['id']);
        
        return $user;
        
    }

}
