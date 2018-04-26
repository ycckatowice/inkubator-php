<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorynterface
 *
 * @author mikolaj
 */
interface CategoryInterface {

    public function __construct(string $name);

    public static function createFromDB(int $id, string $name);

    public function getId(): int;

    public function setId(int $id);

    public function getName(): string;

    public function setName(string $name);
}
