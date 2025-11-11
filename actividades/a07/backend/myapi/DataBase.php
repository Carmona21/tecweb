<?php
namespace MyApi;

abstract class DataBase {
    protected $conexion; 

    public function __construct(string $db, string $user, string $pass, string $host = 'localhost', int $port = 3307) {
        $this->conexion = new \mysqli($host, $user, $pass, $db, $port);

        if ($this->conexion->connect_error) {
            // Un manejo de error más limpio
            http_response_code(500);
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }
}