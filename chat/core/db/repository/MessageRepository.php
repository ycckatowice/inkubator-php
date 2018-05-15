<?php


class MessageRepository {

    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAllAsArray(): array {
        $statement = $this->pdo->prepare("SELECT * FROM `message`");
        $statement->execute();
        
        // fetch data as array
        $rawProducts = $statement->fetchAll();

        return $rawProducts;
    }

    public function insertOne(Message $message): Message {
        $params = [
            'content' => $message->getContent(),
            'user_id' =>  $message->getUserId(),
        ];

        $statement = $this->pdo->prepare("
            INSERT INTO `message` (content, user_id)
            VALUES (:content, :user_id) 
        ");


        $statement->execute($params);
        $message->setId((int) $this->pdo->lastInsertId());
        return $message;
    }
   
}
