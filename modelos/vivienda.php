<?php
require_once 'Conexion.php';

class Vivienda extends Conexion{
    public $viv_id;
    public $viv_num_viv;
    public $viv_nombre;
    public $viv_fecha;
    public $viv_visitante;
    public $viv_situacion;


    public function __construct($args = [] )
    {
        $this->viv_id = $args['viv_id'] ?? null;
        $this->viv_num_viv = $args['viv_num_viv'] ?? '';
        $this->viv_nombre = $args['viv_nombre'] ?? '';
        $this->viv_fecha = $args['viv_fecha'] ?? '';
        $this->viv_visitante = $args['viv_visitante'] ?? '';
        $this->viv_situacion = $args['viv_situacion'] ?? '';
    }

        public function setvivFecha($fecha) {
            $sql = "SELECT * FROM vivienda where $this->viv_fecha = $fecha";
        }
    
        // Resto de métodos de la clase viva...
    public function buscarPorFecha()
        {
            $sql = "SELECT * FROM vivienda WHERE DATE(viv_fecha) = '$this->viv_fecha' AND viv_situacion = 1";
            $resultado = self::servir($sql);
            return $resultado;
        }    
    public function guardar(){
        $sql = "INSERT INTO vivienda(viv_num_viv, viv_nombre, viv_fecha, viv_visitante) values('$this->viv_num_viv','$this->viv_nombre', '$this->viv_fecha','$this->viv_visitante')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from vivienda where viv_situacion = 1 ";

        if($this->viv_nombre != ''){
            $sql .= " and viv_nombre like '%$this->viv_nombre%' ";
        }

        if($this->viv_fecha != ''){
            $sql .= " and viv_fecha = $this->viv_fecha ";
        }
        if($this->viv_visitante != ''){
            $sql .= " and viv_visitante = $this->viv_visitante ";
        }

        if($this->viv_id != null){
            $sql .= " and viv_id = $this->viv_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE vivienda SET viv_nombre = '$this->viv_nombre',  viv_fecha = $this->viv_fecha, viv_visitante = $this->viv_visitante where viv_id = $this->viv_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminasr(){
        $sql = "UPDATE vivienda SET viv_situacion = 0 where viv_id = $this->viv_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function busqueda(){
        

        $sql = "  SELECT vis_nombre, vis_dpi, vis_h_ingreso, vis_h_salida
        FROM visitas; ";


        $resultado = self::servir($sql);
        return $resultado;

    }
}