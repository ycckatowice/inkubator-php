<?php

require_once __DIR__ . "/../autoload.php";

// 1. Fetch from request login && password
$login = getRequestPostVariable('login');
$password = getRequestPostVariable('password');

// 2. Check if login or password are not set. If so exit error response to the browser
if (!$login || !$password) {
    Response::exitWithInvalidResponse(
            ["message" => "login or password variable not sent"] // set response body
            , Response::BAD_REQUEST_RESPONSE_CODE // set response status code
    );
}

// 3. Find user in db and verify password
$userRepository = new UserRepository($pdo);
if (($user = $userRepository->findOneByEmail($login)) && password_verify($password, $user->getPassword())) {
// 3a.
// If everything is maching then return success response with user data in body
// in this case response status code stays as it was at the beginning (StatusCode: 200), meaning: Success
    Response::exitSuccessResponse([
        "user" => [
            "api_token" => $user->getApiToken(),
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName(),
            "email" => $user->getEmail()
        ]
    ]);
} else {
    // 3b. if user is not maching data i database return error response to the browser
    Response::exitWithInvalidResponse(
            ["message" => "Invalid login or password"]
            , Response::BAD_REQUEST_RESPONSE_CODE // set response status code to bad request response
    );
}