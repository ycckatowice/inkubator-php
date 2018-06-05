<?php

namespace Narzedzie;

class Widelec extends Narzedzie{
        public function pokroj($plasterCzego): \Plaster\KoslawyPlaster {
        return new \Plaster\KoslawyPlaster($plasterCzego);
    }
}
