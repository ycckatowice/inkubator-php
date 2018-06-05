<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Narzedzie;

/**
 * Description of Noz
 *
 * @author mikolaj
 */
class Noz extends Narzedzie{
    public function pokroj($plasterCzego): \Plaster\PlaskiPlaster {
        return new \Plaster\PlaskiPlaster($plasterCzego);
    }
}
