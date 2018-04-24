<?php

// Tak jak pdo możemy tworzyć własne rodzaje obiektów
// które później będziemy używać klasa jest to deninicja obiektu
// bardzo podobnie do funkcji. Mamy gdzieś w kodzie definicję funkcji 
// czyli function naszaFunkcja(string $parametr)
// a w innym miejscu ją wywołujemy poprzez nazwę: naszaFunkcja($parametr)
// podobnie jest w obiektach
// Tworzymy sobie definicję np class ProductRepository
// a w innym miejscu odnosimy się do niej poprzez stworzenie obiektu
// $authorization = new Authorization();
// 
// klasy mogą zawierać kilka rodzajów metod
// tj. 
// - publiczne - dostępne są zawsze po wywołaniu konstrukcji (new ProductRepository($pdo))
//
class ProductRepository {

    /**
     * Publiczny wartość która będzie w obiekcie
     * @var type 
     */
    public $pdo;

    /**
     * Konstruktor klasy
     * Definiuje co będzie wymagane do przekazania gdy bedziemy chcieli stworzyć sobie obiejt
     * $productRepository = new ProductRepository($pdo)
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
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function findAll(): array {
        $statement = $this->pdo->prepare("SELECT * from product");

        $statement->execute();
        /**
         * Ustawiliśmy typ fetch. Wcześniej był ustawiony domyślnie w pliku connection.php aby pobrało PDO::FETCH_ASSOC
         * Zmieniamy to na PDO::FETCH_CLASS. Drugim parametrem jest nazwa klasy do jakiej ma być przekazane
         * w ten sposób zrobimy sobie obiekty typu Product które powiedzą nam jakie wartości są w bazie danych
         * Plik Product.php który zawiera klasę Product musi być załądowany w autoload
         */
        $users = $statement->fetchAll(PDO::FETCH_CLASS, "Product");

        return $users;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function deleteOneById(int $id): void {

        $statement = $this->pdo->prepare("DELETE from product WHERE id = :id");
        $statement->execute(['id' => $id]);
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     * Zwracamy typ danych taki jak klasa Product. Plik Product.php który zawiera klasę Product musi być załądowany w autoload
     */
    public function findOneById(int $id): ?Product {
        $statement = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $statement->execute(['id' => $id]);

        /**
         * Ustawiliśmy typ fetch. Wcześniej był ustawiony domyślnie w pliku connection.php aby pobrało PDO::FETCH_ASSOC
         * Zmieniamy to na PDO::FETCH_CLASS. Drugim parametrem jest nazwa klasy do jakiej ma być przekazane
         * w ten sposób zrobimy sobie obiekty typu Product które powiedzą nam jakie wartości są w bazie danych
         * Plik Product.php który zawiera klasę Product musi być załądowany w autoload
         */
        $user = $statement->fetchObject("Product");
        return $user ? $user : NULL;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function insertOne(Product $product): Product {
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

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function updateOne(Product $product): Product {

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
