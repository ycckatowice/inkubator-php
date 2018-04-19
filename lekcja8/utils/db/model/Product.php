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
class Product {

    public $id;
    public $name;
    public $category_id;
    public $cost;

}

