<?php
require '../../modelos/vivienda.php';
require_once '../../modelos/visita.php';

    try {
        $vivienda = new Vivienda($_GET);
        $visita = new Visita();
        $visitas = $visita->buscar();
        $viviendas = $vivienda->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar vivienda</h1>
        <div class="row justify-content-center">
            <form action="/perez_recuperacion/controladores/vivienda/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="viv_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="viv_nombre">Nombre de la visita</label>
                        <select name="viv_nombre" id="viv_nombre" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($visitas as $key => $visita) : ?>
                                <option value="<?= $visita['VIS_ID'] ?>"><?= $visita['VIS_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
               
                <div class="row mb-3">
                    <div class="col">
                        <label for="viv_fecha">Fecha de la vivienda</label>
                        <input type="datetime-local" value="<?= date('Y-m-d\TH:i') ?>" name="viv_fecha" id="viv_fecha" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_ingreso">Hora de entrada</label>
                        <input type="time" value="<?= date('H:i') ?>" name="viv_h_ingreso" id="viv_h_ingreso" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_salida">Hora de salida</label>
                        <input type="time" value="<?= date('H:i') ?>" name="viv_h_salida" id="viv_h_salida" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>