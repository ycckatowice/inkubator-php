<?php

class Authorization {

    const ROLE_ANONYMOUS = 2;
    const ROLE_CUSTOMER = 1;
    const ROLE_ADMIN = 0;

    public static function authorize(array $user) {
        $_SESSION['user'] = $user;
    }

    public static function logout(): void {
        unset($_SESSION['user']);
    }

    public static function isAuthorizedAny(): bool {
       
        return isset($_SESSION['user']);
    }

    public static function isAuthorizedRole(string $role): bool {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] == $role;
    }

    public static function checkPermissions(): void {
        if (!Authorization::isAuthorizedAny() || !Authorization::isAuthorizedRole(Authorization::ROLE_ADMIN)) {
            header("Location: /lekcja8/permission_denied.php");
        }
    }

}
