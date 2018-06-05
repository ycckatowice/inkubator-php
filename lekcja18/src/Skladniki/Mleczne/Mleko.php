<?php

namespace Skladniki\Mleczne;

use Skladniki\Pokarm;

/**
 * Description of Mleko
 *
 * @author mikolaj
 */
class Mleko extends Pokarm{
    
    public function ubij(): Maslo{
        return new Maslo();
    }
    
    public function zwaz(): Ser{
        return new Ser();
    }
}
