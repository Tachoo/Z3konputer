<?php
namespace Controllers;
use Model\ActiveRecord;
use Model\Productos;
use MVC\Router;
class APIController  extends ActiveRecord
{ 
    public static function productos(Router $_routers)
    {
        $_productos=Productos::all();
        //debuguear($_productos);
        echo json_encode($_productos);

        $_routers->render('single/single-product');
    }
}