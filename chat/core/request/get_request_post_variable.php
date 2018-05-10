<?php

function getRequestPostVariable(string $name, string $default = ''): string{
    return isset($_POST[$name])? $_POST[$name]: $default;
}

