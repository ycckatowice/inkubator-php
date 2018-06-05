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
    $woda->dodajSkladnik(new Skladniki\Naturalne\Pierwiastki\Tlen());
    $woda->dodajSkladnik(new Skladniki\Naturalne\Pierwiastki\Wodor());
    $woda->dodajSkladnik(new Skladniki\Naturalne\Pierwiastki\Wodor());
    
    return $woda;
});


$container['pomidor'] = $container->factory(function ($container){
    $pomidor = new Pomidor();
    $pomidor->dodajSkladnik($container['woda']);
    $pomidor->dodajSkladnik(new Skladniki\Witaminy());
    $pomidor->dodajSkladnik(new Skladniki\Rosliny\Skorka());
    $pomidor->dodajSkladnik(new Skladniki\Rosliny\Miazsz());
    
    return $pomidor;
});

$container['kanapka'] = $container->factory(function ($container){
    $kanapka = new Kanapka();
    
    $mleko = new Skladniki\Mleczne\Mleko();
    
    $kanapka->dodajSkladnik($mleko->ubij());
    $kanapka->dodajSkladnik($mleko->zwaz());
    $kanapka->dodajSkladnik(new Szynka());
    $kanapka->dodajSkladnik($container['pomidor']);
    $kanapka->dodajSkladnik(new Skladniki\Rosliny\Szczypiorek());
    $kanapka->dodajSkladnik(new \Skladniki\Naturalne\Sol());
    
    return $kanapka;
});

$kanapka = $container['kanapka'];
    
$kanapka->dodajSkladnik("pieprz");

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