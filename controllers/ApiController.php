<?php
namespace Controllers;
use Model\Productos;
class APIController
{ 
    public static function productos()
    {
        $_productos=Productos::all();
        //debuguear($_productos);
        echo json_encode($_productos);
    }
}