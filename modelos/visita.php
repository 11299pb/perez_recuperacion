<?php
require_once 'Conexion.php';

class visente extends Conexion{
    public $vis_id;
    public $vis_nombre;
    public $vis_dpi;
    public $vis_h_ingreso;
    public $vis_h_salida;
    public $vis_situacion;


    public function __construct($args = [] )
    {
        $this->vis_id = $args['vis_id'] ?? null;
        $this->vis_nombre = $args['vis_nombre'] ?? '';
        $this->vis_dpi = $args['vis_dpi'] ?? '';
        $this->vis_h_ingreso = $args['vis_h_ingreso'] ?? '';
        $this->vis_h_salida = $args['vis_h_salida'] ?? '';
        $this->vis_situacion = $args['vis_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO visitas(vis_nombre, vis_dpi, vis_h_ingreso, vis_h_salida) values('$this->vis_nombre','$this->vis_dpi','$this->vis_h_ingreso', '$this->vis_h_salida)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from visitas where vis_situacion = 1 ";

        if($this->vis_nombre != ''){
            $sql .= " and vis_nombre like '%$this->vis_nombre%' ";
        }

        if($this->vis_dpi != ''){
            $sql .= " and vis_dpi = $this->vis_dpi ";
        }
        if($this->vis_h_ingreso != ''){
            $sql .= " and vis_h_ingreso = $this->vis_h_ingreso ";
        }

        if($this->vis_id != null){
            $sql .= " and vis_id = $this->vis_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE visitas SET vis_nombre = '$this->vis_nombre', vis_dpi = '$this->vis_dpi' , vis_h_ingreso = '$this->vis_h_ingreso', vis_h_salida = '$this->vis_h_salida'  where vis_id = $this->vis_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE visitas SET vis_situacion = 0 where vis_id = $this->vis_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}