<?php

class MikolajOrder implements OrderInterface{
    
    protected $orderId;
    protected $productId;
    protected $productName;
    protected $productCategoryId;
    protected $productCost;
    protected $userId;
    protected $userFirstName;
    protected $userLastName;
    protected $userCity;
    

    public function __construct(\UserInterface $user = null, \ProductInterface $product = null) {
        
        $this->productId = $product->getId();
        $this->productCost = $product->getCost();
        $this->productName = $product->getName();
        $this->productCategoryId = $product->getCategoryId();
        
        $this->userCity = $user->getCity();
        $this->userFirstName = $user->getFirstName();
        $this->userLastName = $user->getLastName();
        $this->userId = $user->getId();
    }

    public static function createFromDB(int $orderId, int $productId, string $productName, int $productCategoryId, float $productCost, int $userId, string $userFirstName, string $userLastName, string $userCity) {
        $self = new self();
        $self->orderId = $orderId;
        $self->productId = $productId;
        $self->productName = $productName;
        $self->productCategoryId = $productCategoryId;
        $self->productCost = $productCost;
        $self->userId = $userId;
        $self->userFirstName = $userFirstName;
        $self->userLastName = $userLastName;
        $self->userCity = $userCity;
    }

    public function getOrderId(): int {
        return $this->orderId;
    }

    public function getProductCategoryId(): int {
        return $this->productCategoryId;
    }

    public function getProductCost(): float {
        return $this->productCost;
    }

    public function getProductId(): int {
        return $this->productId;
    }

    public function getProductName(): string {
        return (string)$this->productName;
    }

    public function getUserCity(): string {
        return (string)$this->userCity;
    }

    public function getUserFirstName(): string {
        return (string)$this->userFirstName;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function getUserLastName(): string {
        return (string)$this->userLastName;
    }

}
