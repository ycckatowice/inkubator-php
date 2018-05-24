<?php

require_once __DIR__. '/vendor/autoload.php';
require_once './kanapka/Pokarm.php';
require_once './kanapka/Kanapka.php';
require_once './skladniki/Pomidor.php';
require_once './skladniki/Szynka.php';

use Pimple\Container;

$container = new Container();



$container['pomidor'] = $container->factory(function (){
    $pomidor = new Pomidor();
    $pomidor->dodajSkaldnik("woda");
    $pomidor->dodajSkaldnik("witaminy");
    $pomidor->dodajSkaldnik("skorka");
    $pomidor->dodajSkaldnik("miąższ");
    
    return $pomidor;
});

$container['kanapka'] = $container->factory(function ($container){
    $kanapka = new Kanapka();
    $kanapka->dodajSkaldnik("maslo");
    $kanapka->dodajSkaldnik("ser");
    $kanapka->dodajSkaldnik(new Szynka());
    $kanapka->dodajSkaldnik($container['pomidor']);
    $kanapka->dodajSkaldnik("szczypiorek");
    $kanapka->dodajSkaldnik("sol");
    
    return $kanapka;
});

$kanapka = $container['kanapka'];
    
$kanapka->dodajSkaldnik("pieprz");

$kanapka2 = $container['kanapka'];
echo "<pre>";
print_r([$kanapka, $kanapka2]);
echo "</pre>";