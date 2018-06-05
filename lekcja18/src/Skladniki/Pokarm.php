<?php
namespace Skladniki;

class Pokarm {
    protected $sladniki = [];
    public function dodajSkaldnik( $skladnik){
        $this->sladniki[] = $skladnik;
    }
}

