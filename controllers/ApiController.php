<?php
namespace Controllers;
use Model\Productos;
use MVC\Router;
class APIController
{ 
    public static function productos(Router $_routers)
    {
        $_productos=Productos::all();
        //debuguear($_productos);
        echo json_encode($_productos);

        $_routers->render('single/single-product');
    }
}