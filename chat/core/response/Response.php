<?php

const BAD_REQUEST_RESPONSE_CODE = 400;

class Response {

    const BAD_REQUEST_RESPONSE_CODE = 400;

    public static function exitSuccessResponse(array $data): void {
        exit(json_encode($data));
    }

    public static function exitWithInvalidResponse(array $data, int $responseCode = self::BAD_REQUEST_RESPONSE_CODE): void {
        http_response_code($responseCode);
        echo json_encode($data);
        exit;
    }

}
