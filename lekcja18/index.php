<?php

require_once __DIR__. '/vendor/autoload.php';

use Pimple\Container;
use Skladniki\Rosliny\Pomidor;
use Skladniki\Szynka;
use Skladniki\Naturalne\Woda;

$container = new Container();

$container['woda'] = $container->factory(function(){
    $woda = new Woda();
    $lod = $woda->zamarznij();
    $woda->dodajSkaldnik(new Skladniki\Naturalne\Pierwiastki\Tlen());
    $woda->dodajSkaldnik(new Skladniki\Naturalne\Pierwiastki\Wodor());
    $woda->dodajSkaldnik(new Skladniki\Naturalne\Pierwiastki\Wodor());
    
    return $woda;
});


$container['pomidor'] = $container->factory(function ($container){
    $pomidor = new Pomidor();
    $pomidor->dodajSkaldnik($container['woda']);
    $pomidor->dodajSkaldnik(new Skladniki\Witaminy());
    $pomidor->dodajSkaldnik(new Skladniki\Rosliny\Skorka());
    $pomidor->dodajSkaldnik(new Skladniki\Rosliny\Miazsz());
    
    return $pomidor;
});

$container['kanapka'] = $container->factory(function ($container){
    $kanapka = new Kanapka();
    
    $mleko = new Skladniki\Mleczne\Mleko();
    
    $kanapka->dodajSkaldnik($mleko->ubij());
    $kanapka->dodajSkaldnik($mleko->zwaz());
    $kanapka->dodajSkaldnik(new Szynka());
    $kanapka->dodajSkaldnik($container['pomidor']);
    $kanapka->dodajSkaldnik(new Skladniki\Rosliny\Szczypiorek());
    $kanapka->dodajSkaldnik(new \Skladniki\Naturalne\Sol());
    
    return $kanapka;
});

$kanapka = $container['kanapka'];
    
$kanapka->dodajSkaldnik("pieprz");

$kanapka2 = $container['kanapka'];
//echo "<pre>";
//print_r([$kanapka, $kanapka2]);
//echo "</pre>";


$czlowiek = new \Czlowiek\Czlowiek();
$czlowiek->podajNarzedzie(new Narzedzie\Widelec());
$plaster = $czlowiek->pokroj($container['pomidor']);

echo "<pre>";
print_r([$plaster]);
echo "</pre>";