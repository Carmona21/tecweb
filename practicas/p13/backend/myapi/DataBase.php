<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;

    public function __construct($db, $user, $pass) {
        // El orden correcto es: Host, Usuario, Password, Base de Datos, Puerto
        $this->conexion = @mysqli_connect(
            'localhost',  // 1. Host
            $user,        // 2. Usuario
            $pass,        // 3. Contraseña
            $db,          // 4. Base de datos
            3307          // 5. Puerto (Aquí es donde debe ir)
        );
    
        if(!$this->conexion) {
            die('¡Base de datos NO conectada! Error: ' . mysqli_connect_error());
        }
    }
}
?>