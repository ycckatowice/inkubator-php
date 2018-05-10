<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author mikolaj
 */
class Message {

    protected $id;
    protected $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getContent(): string {
        return (string) $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
}
