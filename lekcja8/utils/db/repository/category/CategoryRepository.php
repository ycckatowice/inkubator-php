<?php

/* 
 * Tomek
 * Wzorując się na pliku: lekcja8/utils/db/repository/product/ProductRepository.php
 * Utwórz repozytorium dla CategoryRepository ktory zaimplementuje interface CategoryRepositoryInterface oraz wszystkie jego metody
 */


// Tak jak pdo możemy tworzyć własne rodzaje obiektów
// które później będziemy używać klasa jest to deninicja obiektu
// bardzo podobnie do funkcji. Mamy gdzieś w kodzie definicję funkcji 
// czyli function naszaFunkcja(string $parametr)
// a w innym miejscu ją wywołujemy poprzez nazwę: naszaFunkcja($parametr)
// podobnie jest w obiektach
// Tworzymy sobie definicję np class CategoryRepository
// a w innym miejscu odnosimy się do niej poprzez stworzenie obiektu
// $authorization = new Authorization();
// 
// klasy mogą zawierać kilka rodzajów metod
// tj. 
// - publiczne - dostępne są zawsze po wywołaniu konstrukcji (new ProductRepository($pdo))
//
class CategoryRepository implements CategoryRepositoryInterface {

    /**
     * Publiczny wartość która będzie w obiekcie
     * @var type 
     */
    public $pdo;

    /**
     * Konstruktor klasy
     * Definiuje co będzie wymagane do przekazania gdy bedziemy chcieli stworzyć sobie obiekt
     * $categoryRepository = new categoryRepository($pdo)
     * 
     * Linię wyrzej musieliśmy przekazać w nawiasie $pdo dlatego, że jest to wymagany parametr przy konstrukcji obiektu
     * 
     */
    public function __construct(PDO $pdo) {
        /**
         * Aby odnieść się do samego siebie możemy użyć polecenia $this
         * 
         * używając $this-> 
         * mamy dostęp do wszystkich metod(funkcji) w tej klasie
         * 
         */
        $this->pdo = $pdo;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $categoryRepository = new CategoryRepository($pdo)
     * 
     */
    public function findAll(): array {
        $statement = $this->pdo->prepare("SELECT * from category");

        $statement->execute();
        /**
         * Ustawiliśmy typ fetch. Wcześniej był ustawiony domyślnie w pliku connection.php aby pobrało PDO::FETCH_ASSOC
         * Zmieniamy to na PDO::FETCH_CLASS. Drugim parametrem jest nazwa klasy do jakiej ma być przekazane
         * w ten sposób zrobimy sobie obiekty typu Category które powiedzą nam jakie wartości są w bazie danych
         * Plik Category.php który zawiera klasę Product musi być załądowany w autoload
         */
        $users = $statement->fetchAll(PDO::FETCH_FUNC, "Category::createFromDB");
        return $users;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $categoryRepository = new CategoryRepository($pdo)
     * 
     */
    public function deleteOneById(int $id): void {

        $statement = $this->pdo->prepare("DELETE from category WHERE id = :id");
        $statement->execute(['id' => $id]);
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     * Zwracamy typ danych taki jak klasa Product. Plik Category.php który zawiera klasę Category musi być załądowany w autoload
     */
    public function findOneById(int $id): ?CategoryInterface {

        $statement = $this->pdo->prepare("SELECT * FROM category WHERE id = :id");
        $statement->execute(['id' => $id]);

        /**
         * Ustawiliśmy typ fetch. Wcześniej był ustawiony domyślnie w pliku connection.php aby pobrało PDO::FETCH_ASSOC
         * Zmieniamy to na PDO::FETCH_CLASS. Drugim parametrem jest nazwa klasy do jakiej ma być przekazane
         * w ten sposób zrobimy sobie obiekty typu Category które powiedzą nam jakie wartości są w bazie danych
         * Plik Category.php który zawiera klasę Product musi być załądowany w autoload
         */
        
        $users = $statement->fetchAll(PDO::FETCH_FUNC, "Category::createFromDB");

        return !empty($users) ? $users[0] : NULL;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $categoryRepository = new CategoryRepository($pdo)
     * 
     */
    public function insertOne(CategoryInterface $product): CategoryInterface {
        $categoryParams = [
            'name' => $category->getName(),
        ];

        $statement = $this->pdo->prepare("
            INSERT INTO category (name )
            VALUES (:name ) 
        ");


        $statement->execute($categoryParams);
        $category->setId((int) $this->pdo->lastInsertId());
        return $category;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $categoryRepository = new CategoryRepository($pdo)
     * 
     */
    public function updateOne(CategoryInterface $category): CategoryInterface {

        if (!$category->getId()) {
            throw new Exception('Category::updateOne error. Category must have id');
        }

        $categoryParams = [
            'id' => $category->getId(),
            'name' => $category->getName(),
        ];

        $statement = $this->pdo->prepare("
            UPDATE category SET
                name = :name
            WHERE id = :id
        ");


        $statement->execute($categoryParams);

        return $category;
    }

}