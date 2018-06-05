<?php

namespace Czlowiek;

class Czlowiek {
    protected $narzedzie;
    public function podajNarzedzie(\Narzedzie\Narzedzie $narzedzie){
        $this->narzedzie = $narzedzie;
    }
    public function pokroj($pokrojCos): \Plaster\Plaster {
        return $this->narzedzie->pokroj($pokrojCos);
    }
}
