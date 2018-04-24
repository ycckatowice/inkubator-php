<?php

require_once __DIR__ . '/autoload.php';

Authorization::logout();
header('Location: /lekcja8/login.php');

