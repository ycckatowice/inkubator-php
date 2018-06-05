<?php
require_once './vendor/autoload.php';

$adam = new Adam();
$ewa = new Ewa();
$owoc = new OwocNieDoJedzenia();

$adam->czynSobieZiemiePoddana();
$adam->dogladajOgrod();
$adam->rozmnazajSie($ewa);

try{
   $adam->nieJedzOwocu($owoc);
   $ewa->pomagaj($adam);
   
   $adam->przechadzajSiePoOgrodzieZ($ewa);
}catch(GrzechException $e){
    // Uratuj ludzi poprzez Jezusa;
    
    echo $e->getMessage();
}
