<?php
require_once __DIR__."/../autoload.php";
//header('Content-Type: application/json');


function getMessages(PDO $pdo): string {
    $repository = new MessageRepository($pdo);
    $messages = $repository->findAllAsArray();
    
    return json_encode($messages);
}

function saveMessage(PDO $pdo): string {
    $messageRepository = new MessageRepository($pdo);
    
    $content = getRequestPostVariable("content");
    $userId = getRequestPostVariable("user_id");
    $apiToken = getRequestHeader('API_TOKEN');

    $userRepository = new UserRepository($pdo);
    if(!($user = $userRepository->findOneByApiToken($apiToken))){
            Response::exitWithInvalidResponse(
                ["message" => "User is not logged"] // set response body
                , Response::UNAUTHORIZED // set response status code
        );
    }
    
    $message =  new Message($content, $user->getId());
    $messageRepository->insertOne($message);
    
    return json_encode([
        "id" => $message->getId(),
        "content" => $message->getContent(),
        "user_id" =>  $message->getUserId()
    ]);
}


$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET": echo getMessages($pdo);
        break;
    case "POST": echo saveMessage($pdo);
        break;
    default:
        getMessages($pdo);
        break;
}