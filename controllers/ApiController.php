<?php

//Mencionamos el Namespace de controllers que definimos en  -composer.json
namespace Controllers;


use MVC\Router;

//Creamos la classe con el nombre del fichero
class APIController
{
    //Home
    public static function api(Router $_router) //la funcion recibe una classe router
    {
       echo('desde api'); 
    }
    //search

}