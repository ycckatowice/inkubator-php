<?php
/**
 * Przykład statycznego parametru w funkcji, 
 * parametr ten zapisuje się pomiędzy wykonaniami funkcji
 */
function counter(int $wartosc = 0) {
     static $counter = null;
    
    if($wartosc){
        $counter = $wartosc;
    }

    return $counter;
}


echo counter(5);
echo counter();
/**
 * Wzorzec projektowy Singleto (Zawsze ta sama instancja,
 * nie ważne ile razy wywołamy metodę create)
 * 
 * 
 * Przykład statycznego parametru w funkcji, 
 * parametr ten zapisuje się pomiędzy wykonaniami funkcji
 */
class Connection{
    
    public static function create(){
        static $pdo = null;
        
        if(!$pdo){
            $pdo = new self();  
        }
        return $pdo;
    }
}



var_dump(Connection::create());
var_dump(Connection::create());


/**
 * Statyczny parametr to jest taki który jest współdzielony pomiedzy wszystkie obiekty tej klasy
 * Nawet te obiekty które będą utworzone dopiero po zmianie
 */
class ZawszeInna{
    public $jestemTylkoWJednejInstancji;
    static $jestemWszedzie = 100;
}

$obiekt1 = new ZawszeInna();
$obiekt1->jestemTylkoWJednejInstancji = 15;

$obiekt2 = new ZawszeInna();
$obiekt2->jestemTylkoWJednejInstancji = 10;

echo "<br>Test Obiektów public vs. static";
echo $obiekt1->jestemTylkoWJednejInstancji. ", ". $obiekt2->jestemTylkoWJednejInstancji;

$obiekt1::$jestemWszedzie = 7;
$obiekt2::$jestemWszedzie = 3;


$obiekt3 = new ZawszeInna();
        
echo "<br>Static from ZawszeInna: ". $obiekt3::$jestemWszedzie;

$mojaNazwaParametru = "jestemTylkoWJednejInstancji";



echo "<br>Dynamizacja: <br> {$mojaNazwaParametru}";
echo $obiekt1->{$mojaNazwaParametru};

echo " <br> Jeszcze jeden Przypadek dynamicznego przekazania:";
$zero = 0;
$zmienna = "zero";

echo $$zmienna;


/**
 * Referencja
 */
$sto = 100;
$lustro = &$sto;


$lustro = 150;
$lustro = null;
echo "<br>Lustro: ". $sto;


function zmianaPrzezReferencje(int &$wartosc){
    $wartosc = 7;
    return $wartosc;
}

$moje5groszy = 5;

zmianaPrzezReferencje($moje5groszy);

echo "<br> Zmina w funkcji przez referencje: ".  $moje5groszy;

$obiekt4 = new ZawszeInna();
$obiekt4->jestemTylkoWJednejInstancji = 20;

$pierwszyArgument = 1000;

function zmianaObiektu(int $pierwszyArgument, ZawszeInna &$obj){
    $pierwszyArgument = 500;
    $obj->jestemTylkoWJednejInstancji = 40;
    $obj = null;
}

zmianaObiektu($pierwszyArgument, $obiekt4);
echo "<br><br>zmianaObiektu, zwykły parametr: ". $pierwszyArgument;
echo "<br> zmianaObiektu bez referencji: ". $obiekt4->jestemTylkoWJednejInstancji;