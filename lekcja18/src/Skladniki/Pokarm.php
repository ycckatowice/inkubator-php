<?php
namespace  Skladniki;

class Pokarm {
    protected $skladniki;
    public function dodajSkladnik($skladnik){
        $this->skladniki[] = $skladnik;
    }
}