<?php


class MikolajBasket implements BasketInterface {

    //Put your code here

    protected $user;
    protected $products;

    public function __construct(\UserInterface $user) {
        $this->user = $user;
    }
    
    public function addProduct(\ProductInterface $product): void {
        $this->products[] = $product;
    }

    public function clear(): void {
        $this->products = [];
    }

    public function countProducts(): int {
        return count($this->products);
    }

    public function getOrders(): array {
        $orders = [];
        foreach ($this->products as $product) {
            $orders[] = new MikolajOrder($this->user, $product);
        }

        return $orders;
    }

    public function getUser(): \UserInterface {
        return $this->user;
    }

    public function removeProduct(\ProductInterface $product): void {

        foreach ($this->products as $productKey => $productFromBasket) {
            if ($productFromBasket->getId() == $product->getId()) {
                unset($this->products[$productKey]);
                // Force removing specific product only once
                break;
            }
        }
    }
}
