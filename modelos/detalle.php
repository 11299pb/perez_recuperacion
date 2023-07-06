<?php
require_once 'Conexion.php';

class Condominio extends Conexion{
    public $condominio_id;
    public $condominio_nombre;
    public $condominio_direccion;
    public $condominio_h_ingreso;
    public $condominio_h_salida;
    public $condominio_situacion;


    public function __construct($args = [] )
    {
        $this->condominio_id = $args['condominio_id'] ?? null;
        $this->condominio_nombre = $args['condominio_nombre'] ?? '';
        $this->condominio_dpi = $args['condominio_dpi'] ?? '';
        $this->condominio_h_ingreso = $args['condominio_h_ingreso'] ?? '';
        $this->condominio_h_salida = $args['condominio_h_salida'] ?? '';
        $this->det_situacion = $args['det_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO condominioitas(condominio_id, condominio_nombre, condominio_dpi, condominio_h_ingreso, condominio_h_salida) values('$this->condominio_id','$this->condominio_nombre', '$this->condominio_dpi', '$this->condominio_h_ingreso', '$this->condominio_h_salida')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT condominio_nombre, condominio_dpi, condominio_h_ingreso, condominio_h_salida
        FROM condominioitas;";

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