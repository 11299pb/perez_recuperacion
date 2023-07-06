<?php

require_once '../../modelos/visita.php';
require_once '../../modelos/vivienda.php';
    try {
        $vivienda = new Vivienda();
        $visita = new Visita();
        $viviendas = $vivienda->buscar();
        $visitas = $visita->buscar();
            // var_dump($clientes);
            // exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        
        <BR><div class="row justify-content-center">
           <BR> <form action="/perez_recuperacion/controladores/vivienda/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                    <h1 class="text-center">FORMULARIO DE DATOS DE VIVIENDA</h1>
                        <BR><label for="viv_nombre" style="color: #333;">Nombre del Condominio</label>
                        <input type="text" name="viv_nombre" id="viv_nombre" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="viv_num_viv" style="color: #333;">No. de vivienda</label>
                        <input type="number" name="viv_num_viv" id="viv_num_viv" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="viv_visitante" style="color: #333;">Nombre a quien visita</label>
                        <input type="text" name="viv_visitante" id="viv_visitante" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <label for="viv_fecha">Fecha de la visita</label>
                        <input type="date" value="<?= date('d/m/Y') ?>" name="viv_fecha" id="viv_fecha" class="form-control">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>