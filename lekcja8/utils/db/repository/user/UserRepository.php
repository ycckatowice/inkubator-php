<?php

/* 
 * Oskar
 * Wzorując się na pliku: lekcja8/utils/db/repository/product/ProductRepository.php
 * Utwórz repozytorium dla UserRepository ktory zaimplementuje interface CategoryRepositoryInterface oraz wszystkie jego metody
 */

class UserRepository implements UserRepositoryInterface{
  
    public $pdo;
    
    public function _construct(PDO $pdo)
            {
                $this->pdo=$pdo;
            }
            
    public function findaAll():array
        {
            $statement= $this->pdo->prepare("SELECT * FROM user");
            $statement->execute();
            
            $user = $sttatement->fetchAll(PDO::FETCH_FUNC, "User::createFromDB");
            return $user;
        }
        
    public function deleteOneById(int $id): void 
        {
            $statement = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
            $statement->execute(['id' => $id]);
        }
        
    public function findOneById(int $id): ?UserInterface
        {
            $statement = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
            $statement->execute(['id'=>$id]);
            
            $user = $statement->fetchAll(PDO::FETCH_FUNC, "User::createFromDB");
            
            return !empty($user) ? $user[0] : NULL;
        }
        
    public function insertOne(UserInterface $user): UserInterface 
        {
            $userParams = 
                    [
                        'first_name' => $user->getFirstName(),
                        'last_name'=> $user->getLastName(),
                        'email'=> $user->getEmail(),
                        'city'=> $user->getCity(),
                        'role'=> $user->getRole(),
                    ];
            $statement = $this->pdo->prepare("
                     INSERT INTO user (first_name, last_name, email, city, role)
                     VALUES (:first_name, :last_name, :email, :city, :role)
                     ");
            $statement->execute($userParams);
            $user->setId((int) $this->pdo->lastInsertId());
            returtn $user;
            }
            
    public function updateOne(UserInterface $user): UserInterface
        {
             if (!$user->getId()) 
                 {
                    throw new Exception('User::updateOne error. User must have an id');
                 }
             $userParams = 
                    [   
                        'id' => $user->getId(),
                        'first_name' => $user->getFirstName(),
                        'last_name'=> $user->getLastName(),
                        'email'=> $user->getEmail(),
                        'city'=> $user->getCity(),
                        'role'=> $user->getRole(),
                    ];
             $statement = $this->pdo->prepare("
                      UPDATE user SET
                      first_name = :first_name
                      last_name = :last_name
                      email = :email
                      city = :city
                      role = :role
                      WHERE id = :id")
             $statement->execute($userParams);
             
             return $user;
        }
        
    public function findOneByEmail(string $email): ?UserInterface
        {   
            $statement = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
 //ktora wersja dobra? $statement = $this->pdo->prepare("SELECT * FROM user WHERE email = ':email'");
            $statement->execute(['email'=>$email]);
            
            $user = $statement->fetchAll(PDO::FETCH_FUNC, "User::createFromDB");
            
            return !empty($user) ? $user[0] : NULL;
        }

};