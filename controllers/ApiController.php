<?php

namespace Controllers;
use MVC\Router;

class testController
{
    public static function index(Router $_router) //la funcion recibe una classe router
    {
        $_router->render('API/api'); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }
}