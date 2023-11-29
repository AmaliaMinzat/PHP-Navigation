<?php

function dd($value) //Dump and Die function -> takes a variable and dumps it on the page so I can see the data inside.
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value ;
}
