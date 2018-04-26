<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserInterface
 *
 * @author mikolaj
 */
interface UserInterface {

    //put your code here
    public function __construct(string $firstName, string $lastName, string $email, string $city, string $role, string $password);

    public static function createFromDB(int $id, string $firstName, string $lastName, string $email, string $city, string $role, string $password);

    public function getId(): int;

    public function getFirstName(): string;

    public function getLastName(): string;

    public function getEmail(): string;

    public function getCity(): string;

    public function getRole(): int;

    public function getPassword(): string;

    public function setId(int $id): void;

    public function setFirstName(string $firstName): void;

    public function setLastName(string $lastName): void;

    public function setEmail(string $email): void;

    public function setCity(string $city): void;

    public function setRole(int $role): void;

    public function setPassword(string $password): void;
}
