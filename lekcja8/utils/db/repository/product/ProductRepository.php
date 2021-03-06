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
class ProductRepository implements ProductRepositoryInterface {

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
        $rawProducts = $statement->fetchAll();

        $hydratedProducts = [];
        foreach ($rawProducts as $rawProduct) {
            $hydratedProducts[] = $this->hydrate($rawProduct);
        }
        return $hydratedProducts;
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

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function insertOne(ProductInterface $product): ProductInterface {
        $productParams = [
            'name' => $product->getName(),
            'category_id' => $product->getCategoryId(),
            'cost' => $product->getCost()
        ];

        $statement = $this->pdo->prepare("
            INSERT INTO product (name, category_id, cost)
            VALUES (:name, :category_id, :cost) 
        ");


        $statement->execute($productParams);
        $product->setId((int) $this->pdo->lastInsertId());
        return $product;
    }

    /**
     * Funkcja publiczna jest dostępna tylko po wywołaniu konstruktora new
     * $productRepository = new ProductRepository($pdo)
     * 
     */
    public function updateOne(ProductInterface $product): ProductInterface {

        if (!$product->getId()) {
            throw new Exception('Product::updateOne error. Product must have id');
        }

        $productParams = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'category_id' => $product->getCategoryId(),
            'cost' => $product->getCost()
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

    protected function hydrate(array $rawProduct): Product {
        
        // utworzenie instancji klasy Produkt poprzez Refleksje
        // Chcemy uniknąć braku wymaganych argumentów do new Product()
        $reflection = new ReflectionClass(Product::class);
        $product = $reflection->newInstanceWithoutConstructor();
        
        
        // utworzenie clousure do wpisywania parametrów obiektu $produkt
        $hydrateProductFunction = function(array $data) {
            // na tym etapie $this nie jest zdefiniowany
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->categoryId = $data['category_id'];
            $this->cost = $data['cost'];
        };
        // poprzez wywołanie na clousure metody bindTo przypisujemy mu czym jest $this
        // chcemy by $this był częścią instancji $produkt
        $hydrateProductFunction = $hydrateProductFunction->bindTo($product, $product);

        $hydrateProductFunction($rawProduct);

        return $product;
    }

    public function findOneById(int $id): ?ProductInterface {

        $statement = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $statement->execute(['id' => $id]);

        /**
         * Ustawiliśmy typ fetch. Wcześniej był ustawiony domyślnie w pliku connection.php aby pobrało PDO::FETCH_ASSOC
         * Zmieniamy to na PDO::FETCH_CLASS. Drugim parametrem jest nazwa klasy do jakiej ma być przekazane
         * w ten sposób zrobimy sobie obiekty typu Product które powiedzą nam jakie wartości są w bazie danych
         * Plik Product.php który zawiera klasę Product musi być załądowany w autoload
         */
        $product = $statement->fetch();

        return $product ? $this->hydrate($product) : null;
    }

}
