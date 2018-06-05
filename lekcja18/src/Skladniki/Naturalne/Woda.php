<?php

namespace Skladniki\Naturalne;
use Skladniki\Pokarm;

class Woda extends Pokarm{
    public function zamarznij(): Lod{
        return new Lod();
    }
}
