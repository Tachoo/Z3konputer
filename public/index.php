<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\PageController;
use MVC\Router;
//instancia del objeto router
$router = new Router();
 //llamamos el metodo get  y le colocamos un call del controlador  y la funcion que se ejecutara en el caso de la ruta especificada

 //Index
$router->get('/',[PageController::class,'home']);
//Busqueda
$router->get('/s',[PageController::class,'search']);
//Product-Single
//Busqueda
$router->get('/p',[PageController::class,'single_product']);

//users
//Register
$router->get('/register',[PageController::class,'register']);
$router->post('/register',[PageController::class,'register']);
//Login
$router->get('/login',[PageController::class,'login']);
$router->post('/login',[PageController::class,'login']);
//Reset Password
$router->get('/forgot',[PageController::class,'olvide']);
$router->post('/forgot',[PageController::class,'olvide']);
//recuperar
$router->get('/recuperar-cuenta',[PageController::class,'recuperar']);
$router->post('/recuperar-cuenta',[PageController::class,'recuperar']);
//Mensaje de revisa tu mail
$router->get('/mensaje',[PageController::class,'mensaje']);
//confirmar cuenta
$router->get('/confirmar-cuenta',[PageController::class,'confirmar']);
//Api services
$router->get('/api',[PageController::class,'mensaje']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();