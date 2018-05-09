<?php

/**
 * Jest to obiekt klasy Product w którym trzymamy dane z bazy danych z tabeli produkt.
 * Zawiera on cztery publiczne wartości które nazywają się dokładnie tak jak kolumny w bazie danych.
 * 
 * Zrobiliśmy tak aby nie musieć patrze w bazie danych jak nazywają się te kolumny
 * Gdy skonstruujemy sobie obiekt Product ($product = new Product()), będziemy mogli zobaczyć jakie 
 * mamy nazwy kolumn po wpisaniu $product->
 * pokażą nam się podpowiedzi w NetBeans, lub możemy kliknąć ctrl+spacja aby wymusić pokazanie podpowiedzi
 * 
 */
class Product implements ProductInterface{

    /**
     * @var int
     */
    protected $categoryId;
    protected $id;
    protected $name;
    protected $cost;

    public function __construct(string $name, int $categoryId, float $cost) {
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->cost = $cost;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    function getName(): string {
        return $this->name;
    }

    function getId(): int {
        return $this->id;
    }
    
    function setId(int $id): void {
         $this->id = $id;
        
    }

    function getCategoryId(): int {
        return $this->categoryId;
    }

    function getCost(): int {
        return $this->cost;
    }

    function setCategoryId(int $categoryId): void {
        $this->categoryId = $categoryId;
    }

    function setCost(float $cost): void {
        $this->cost = $cost;
    }

//    public static function createFromDB(int $id, string $name, int $categoryId, float $cost): ProductInterface {
//        $productMapper = new ProductMapper();
//        $productMapper->hydrate()
//        $product = new self($name, $categoryId, $cost);
//        $product->id = $id;
//        
//        return $product;
//    }
}
