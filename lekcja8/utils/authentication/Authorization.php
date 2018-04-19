<?php
// Tak jak pdo możemy tworzyć własne rodzaje obiektów
// które później będziemy używać klasa jest to deninicja obiektu
// bardzo podobnie do funkcji. Mamy gdzieś w kodzie definicję funkcji 
// czyli function naszaFunkcja(string $parametr)
// a w innym miejscu ją wywołujemy poprzez nazwę: naszaFunkcja($parametr)
// podobnie jest w obiektach
// Tworzymy sobie definicję np class Authorization
// a w innym miejscu odnosimy się do niej poprzez stworzenie obiektu
// $authorization = new Authorization();
// 
// klasy mogą zawierać kilka rodzajów metod
// tj. 
// - publiczne - dostępne są zawsze po wywołaniu konstrukcji (new Authorization())
// - statyczne - dostępne są bez wywoływania konstrukcji wystarczy wpisać nazwę klasy i nazwę metody
// czyli: Authorization::authorize($user)
//
class Authorization {

    /**
     * Stałe wartości w klasie. Nie da się ich nadpisać. 
     * Będą dostępne poprzez wywołanie: Authorization::ROLE_ANONYMOUS
     */
    const ROLE_ANONYMOUS = 2;
    const ROLE_CUSTOMER = 1;
    const ROLE_ADMIN = 0;
    
    /*
     * Metoda statyczna
     * Ta metoda będzie dostępna poprzez wywołanie Authorization::authorize
     */
    public static function authorize(array $user) {
        $_SESSION['user'] = $user;
    }
    /*
     * Metoda statyczna
     * Ta metoda będzie dostępna poprzez wywołanie Authorization::authorize
     */
    public static function logout(): void {
        unset($_SESSION['user']);
    }
    /*
     * Metoda statyczna
     * Ta metoda będzie dostępna poprzez wywołanie Authorization::authorize
     */
    public static function isAuthorizedAny(): bool {
       
        return isset($_SESSION['user']);
    }
    /*
     * Metoda statyczna
     * Ta metoda będzie dostępna poprzez wywołanie Authorization::authorize
     */
    public static function isAuthorizedRole(string $role): bool {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] == $role;
    }
    /*
     * Metoda statyczna
     * Ta metoda będzie dostępna poprzez wywołanie Authorization::authorize
     */
    public static function checkPermissions(): void {
        if (!Authorization::isAuthorizedAny() || !Authorization::isAuthorizedRole(Authorization::ROLE_ADMIN)) {
            header("Location: /lekcja8/permission_denied.php");
        }
    }

}
