<?php
require_once 'Conexion.php';

class Condominio extends Conexion{
    public $condominio_id;
    public $condominio_nombre;
    public $condominio_numero;
    public $condominio_situacion;


    public function __construct($args = [] )
    {
        $this->condominio_id = $args['condominio_id'] ?? null;
        $this->condominio_nombre = $args['condominio_nombre'] ?? '';
        $this->condominio_numero = $args['condominio_numero'] ?? '';
        $this->condominio_situacion = $args['condominio_situacion'] ?? '';
        
    }

    public function guardar(){
        $sql = "INSERT INTO condominios(condominio_id, condominio_nombre, condominio_numero, condominio_situacion) values('$this->condominio_id','$this->condominio_nombre', '$this->condominio_numero', '$this->condominio_situacion)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT condominio_id, condominio_nombre, condominio_numero, condominio_situacion
        FROM condominios;";

        if($this->condominio_nombre != ''){
            $sql .= " and condominio_nombre = $this->condominio_nombre ";
        }

        $sql .= " group by condominio_nombre";


        // echo $sql;
        // exit;

        $resultado = self::servir($sql);
        return $resultado;
    }
}