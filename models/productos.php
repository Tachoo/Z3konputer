<?php
namespace Model;
use MVC\Router;

class Productos extends ActiveRecord
{
    //Referencia de datos con la classe Active Records
    protected static $tabla ='productos';
    protected static $columnasDB=['id','name','precio'];

    public $id;
    public $name;
    public $precio;
    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->nombre=$args['name'] ?? null;
        $this->precio=$args['precio'] ?? null;      
    }

    
}