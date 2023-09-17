<?php
namespace Model;
use MVC\Router;

class Passwords extends ActiveRecord
{
    //Referencia de datos con la classe Active Records
    protected static $tabla ='password';
    protected static $columnasDB=['id','create_time','fk_usuario','password','active','expiration_date'];

    public $id;
    public $create_time;
    public $correo;
    public $password;
    public $confirm_password;
    public $telefono;
    public $confirmado;
    public $token;

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->create_time=$args['create_time'] ?? null;
        $this->correo=$args['correo'] ?? null;
        $this->password=$args['password'] ?? null;
        $this->telefono=$args['telefono'] ?? null;
        $this->confirmado=$args['confirmado'] ?? 0;
        $this->token=$args['token'] ?? null;       
    }

    //mensajes de valicacion

    public function validarNuevaCuenta()
    {
        //Validacion si estan vacias las variables que ingreso el usuario
        if(!$this->correo)
        {
            self::$alertas['error'][]='El campo  de correo es obligatorio';
        }
        if(!$this->password)
        {
            self::$alertas['error'][]='El campo de contraseña es obligatorio';
        }
        if(!$this->confirm_password)
        {
            self::$alertas['error'][]='El campo es confirmar contraseña es  obligatorio';
        }
        //Validar si password tiene mas de 7 caracteres
        if(strlen($this->password)<6 )
        {
            self::$alertas['error'][]='El campo de password debe contener al menos 6 caracteres';
        }
        if($this->password != $this->confirm_password)
        {
            self::$alertas['error'][]='Las contraseñas no coinciden';
        }

        return self::$alertas; //Retornamos alertas
    }
    //validar login
    public function validarLogin()
    {
        //Validacion si estan vacias las variables que ingreso el usuario
        if(!$this->correo)
        {
            self::$alertas['error'][]='El campo  de correo es obligatorio';
        }
        if(!$this->password)
        {
            self::$alertas['error'][]='El campo de contraseña es obligatorio';
        }

        return self::$alertas; //Retornamos alertas
    }
    //Revisa si el usuario existe en los registros
    public function UsuarioExiste()
    {
      $query="SELECT * FROM ".self::$tabla." WHERE correo='".$this->correo."' ";
      //debuguear($query);
      $resultado = self::$db->query($query);//Se hace la consulta en la base de datos

      //verificar el resultado
      if($resultado->num_rows)
      {
        self::$alertas['error'][]="El usuario ya esta registrado";
      }

      
      return $resultado;

    }

    public function HashPassword()
    {
        $this->password=password_hash($this->password,PASSWORD_BCRYPT);
    }
    public function GenToken()
    {
        //tiene un priblema que agrega un espacio vacio por que le da la gana... 
        // Lo mejor es debugear pero para efectos de prueba le gragamos ese espacio en '/validar'
        $this->token=s(uniqid('cmcio',false));
    }
}