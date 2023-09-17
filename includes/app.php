<?php 
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';
//Instanciamos el modelo de dotenv
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();//guardamos

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);