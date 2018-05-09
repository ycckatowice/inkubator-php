<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasketManager
 *
 * @author mikolaj
 */
class BasketManager  {
    
    public static function saveBasket(BasketInterface $basket){
        $_SESSION["user"]["basket"] = serialize($basket);
    }
    
    public static function getBasket(): BasketInterface {
        return unserialize($_SESSION["user"]["basket"]);
    }

}
