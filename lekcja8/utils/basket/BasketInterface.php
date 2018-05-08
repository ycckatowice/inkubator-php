<?php

/**
 * Description of Basket
 *
 * @author mikolaj
 */
interface BasketInterface {

    public function __construct(UserInterface $user);
    /**
     * Returns user of a basket
     */
    public function getUser(): UserInterface;
    /**
     * Allows to add product into user's basket
     * return UserInterface 
     */
    public function addProduct(ProductInterface $product): void;

    /**
     * Allows to remove specific product from a basket
     * @param ProductInterface $product
     */
    public function removeProduct(ProductInterface $product): void;

    /**
     * Creates Orders out of Products inside a basket
     * @return [OrderInterface]
     */
    public function getOrders(): array;

    /**
     * Counts ammount of products inside a basket
     */
    public function countProducts(): int;
    
    /**
     * Trash all from the basket
     */
    public function clear(): void;
}
