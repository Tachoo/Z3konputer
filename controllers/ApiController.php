<?php

//Mencionamos el Namespace de controllers que definimos en  -composer.json
namespace Controllers;


use Model\Productos;
use MVC\Router;

//Creamos la classe con el nombre del fichero
class APIController
{
    //Home
    public static function api() //la funcion recibe una classe router
    {
        $product = Productos::all();
       debuguear($product);


    }
    //search

}