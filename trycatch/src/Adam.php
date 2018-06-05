<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adam
 *
 * @author mikolaj
 */
class Adam {
    protected $owocCoNieJesc;
    
    public function dogladajOgrod(){
        
    }
    public function czynSobieZiemiePoddana(){
        
    }
    
    public function rozmnazajSie(Ewa $ewa){
        
    }
    
    public function nieJedzOwocu(Owoc $owoc){
        $this->owocCoNieJesc = $owoc;
    }
    
    public function przechadzajSiePoOgrodzieZ($ktos){
        $rand = rand(1,10);
        if($rand == 5){
            throw new GrzechException();
        }
    }
    
}
