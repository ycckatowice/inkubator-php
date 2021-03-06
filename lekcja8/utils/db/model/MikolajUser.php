<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MikolajUser
 *
 * @author mikolaj
 */
class MikolajUser implements UserInterface{

    private $id;
    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $firstName;

    //put your code here
    public function __construct(string $firstName, string $lastName, string $email, string $city, string $role, string $password) {
        
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->city = $city;
        $this->role = $role;
        $this->password = $password;
    }

    public function getCity(): string {
        return (string) $this->city;
    }

    public function getEmail(): string {
        return (string) $this->email;
    }

    public function getFirstName(): string {
        return (string) $this->firstName;
    }

    public function getId(): int {
        return (int)$this->id;
    }

    public function getLastName(): string {
        return (string) $this->lastName;
    }

    public function getPassword(): string {
        return (string) $this->password;
    }

    public function getRole(): int {
        return (int) $this->role; 
    }

    public function setCity(string $city): void {
        
    }

    public function setEmail(string $email): void {
        
    }

    public function setFirstName(string $firstName): void {
        
    }

    public function setId(int $id): void {
        
    }

    public function setLastName(string $lastName): void {
        
    }

    public function setPassword(string $password): void {
        
    }

    public function setRole(int $role): void {
        
    }

    public static function createFromDB(int $id, string $firstName, string $lastName, string $email, string $city, string $role, string $password) {
        
    }

}
