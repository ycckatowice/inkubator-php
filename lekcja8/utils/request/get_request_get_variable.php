<?php

function getRequestGetVariable(string $name, string $default = ''): string{
    return isset($_GET[$name])? $_GET[$name]: $default;
}

