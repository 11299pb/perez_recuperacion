<?php
require_once 'Conexion.php';

class det extends Conexion{
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
        $this->det_situacion = $args['det_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO visitas(vis_id, vis_nombre, vis_dpi, vis_h_ingreso, vis_h_salida) values('$this->vis_id','$this->vis_nombre', '$this->vis_dpi', '$this->vis_h_ingreso', '$this->vis_h_salida')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT vis_nombre, vis_dpi, vis_h_ingreso, vis_h_salida
        FROM visitas;";

        if($this->vis_nombre != ''){
            $sql .= " and vis_nombre = $this->vis_nombre ";
        }

        $sql .= " group by vis_nombre";


        // echo $sql;
        // exit;

        $resultado = self::servir($sql);
        return $resultado;
    }
}