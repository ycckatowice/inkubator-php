<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_startup_errors  ", 1);
ob_start();

require_once __DIR__.'/../autoload.php';

?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    </head>
    <body>
        <div class="container">
<?php
require_once __DIR__ ."/navigation.php";
?>
            
