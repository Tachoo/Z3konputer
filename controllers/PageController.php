<?php

//Mencionamos el Namespace de controllers que definimos en  -composer.json
namespace Controllers;
use Classes\Email;
use Model\Search;
use Model\Usuario;
use MVC\Router;

//Creamos la classe con el nombre del fichero
class PageController
{
    //Home
    public static function home(Router $_router) //la funcion recibe una classe router
    {
        $_router->render('home/home'); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }
    //search
    public static function search(Router $_router) //la funcion recibe una classe router
    {
        $query= new Search();
        $_router->render('search/search'); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }
    //single product / details
    public static function single_product(Router $_router) //la funcion recibe una classe router
    {
        $_router->render('single/single-product'); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }

    //Auth section
    public static function register(Router $_router)//la funcion recibe una classe router
    {
        $_usuario=new Usuario;
        //Alertas
        $_alertas=[];
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_usuario->sincronizar($_POST);
            $_alertas=$_usuario->validarNuevaCuenta();
            if(empty($_alertas))
            {
                //pasamos la validacion del usuario nuevo
               $result=$_usuario->UsuarioExiste();
               if($result->num_rows)
               {
                 Usuario::setAlerta('error','el correo actualmente esta en uso');
                 $_alertas = Usuario::getAlertas();// esta registrado el usuario
               }else
               {
                 //No esta registrado
                 //hash usuario
                 $_usuario->HashPassword();
                 $_usuario->GenToken();
                 $_usuario->create_time=$_usuario->GetTimestamp();
                 //enviar mail
                $email=new Email($_usuario->correo,$_usuario->token);
                $email->EnviarConfirm();
                $result=$_usuario->guardar();

                if($result)
                {
                    header('Location:/mensaje');
                }

               }
            }
           // debuguear($_usuario);
        }


        $_router->render('auth/register',[
            'usuario'=>$_usuario,
            'alertas'=>$_alertas
        ]); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }

    public static function confirmar(Router $_router)
    {
        //instanciar arreglo
        $_alertas=[];
        //
        $_token=s($_GET['token']);
        $_token.=' ';
        $_usuario=Usuario::where('token',$_token);
        if(empty($_usuario))
        {
            Usuario::setAlerta('error','token no valido');    
        }else
        {
            //usuario
            $_usuario->confirmado=1;
            $_usuario->token=null;
            //password
            //
            $_usuario->guardar();
            Usuario::setAlerta('exito','Cuanta comprobada correctamente');
        }

        $_alertas=Usuario::getAlertas();


        $_router->render('auth/confirmar',[
            'alertas'=>$_alertas
        ]); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    
    }

    public static function mensaje(Router $_router)
    {
        $_router->render('auth/mensaje'); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    
    }
    public static function login(Router $_router)
    {
        //instanciar usuario
        $_auth=new Usuario;
        //instanciar arreglo
        $_alertas=[];
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_auth->sincronizar($_POST);
            $_alertas=$_auth->validarLogin();
            if(empty($_alertas))
            {
                //pasamos la validacion del usuario
               $_usuario=Usuario::where('correo',$_auth->correo);
               if($_usuario)
               {
                    if( $_usuario->ComprobarPasswordandConfirm($_auth->password))
                    {
                        //si esta correcto authentificamos al usuario
                        
                        $_SESSION['id']=$_usuario->id;
                        $_SESSION['correo']=$_usuario->correo;
                        $_SESSION['login']=true;

                        header('Location:/');//lo mandamos al home

                        //debuguear($_SESSION);
                    }
                $_alertas = Usuario::getAlertas();// esta registrado el usuario 
               }else
               {
                Usuario::setAlerta('error','El usuario no existe o no esta activo');
                $_alertas = Usuario::getAlertas();// esta registrado el usuario
               }
            }
           // debuguear($_usuario);
        }




        
        $_router->render('auth/login',[
            'usuario'=>$_auth,
            'alertas'=>$_alertas
        ]); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    }
    
    public static function olvide(Router $_router)
    {
        $_alertas=[];
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_auth= new Usuario($_POST);
            $_alertas= $_auth->validaremail();
            if(empty($_alertas))
            {
                //
                $_usuario=Usuario::where('correo',$_auth->correo);
                if($_usuario&& $_usuario->confirmado==='1')
                {
                    //gen token
                    $_usuario->GenToken();
                    $_usuario->guardar();

                     $_email=new Email($_usuario->correo,$_usuario->token);
                     $_email->EnviarResetPassword();

                    
                    Usuario::setAlerta('exito','Revisa tu bandeja de correo');
                    //debuguear($_usuario);
                }else
                {
                    Usuario::setAlerta('error','usuario no existe o no esta confirmado');
                }
            }
        }
        $_alertas=Usuario::getAlertas();
        $_router->render('auth/olvide',[
            'alertas'=>$_alertas
        ]); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 

    }

    public static function recuperar(Router $_router)
    {
        //instanciar arreglo
        $_alertas=[];
        //
        $_password=new Usuario;
        //
        $_token=s($_GET['token']);
        $_usuario=Usuario::where('token',$_token);
        if(empty($_usuario))
        {
            Usuario::setAlerta('error','token no valido');
            header('Location:/');//lo mandamos al home 
        }
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_password->sincronizar($_POST);
            $validacion=$_password->validarpassword();
            if(empty($validacion))
            {
                $_usuario->password=null;
                $_usuario->password=$_password->password;
                $_password->password=null;
                $_password->confirm_password=null;
                $_usuario->hashpassword();
                $_usuario->token=null;
                $_usuario->guardar();
                
                header('Location:/login');//lo mandamos al home 

            }
           // Usuario::setAlerta('exito','Cuanta comprobada correctamente');
        }
        

        $_alertas=Usuario::getAlertas();
        $_router->render('auth/recuperar',[
            'alertas'=>$_alertas
        ]); //La funcion recibe dos parametros | vista | arreglo |  el arreglo es para pasarle los valores a la vista 
    
    }

}