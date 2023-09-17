<?php
namespace Model;
use MVC\Router;

class Search extends ActiveRecord
{
    //Referencia de datos con la classe Active Records
    protected static $tabla ='productos';
    protected static $columnasDB=['id','','','','','',''];

    public $id;
    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;      
    }
    
}