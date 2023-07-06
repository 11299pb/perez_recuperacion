<?php

require '../../modelos/vivienda.php';
require '../../modelos/visita.php';



try {
    $vivienda = new Vivienda($_GET);
    $detalle = new Detalle();
    $viviendas = $vivienda->buscar();
    $detalles = $detalle->buscar();
    $visitas = $visita->buscar();
   
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-dark">
                            <th colspan="6">DETALLE DE LA VISITA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="6"><center>VISITA DEL DIA (<?= date('d/m/Y' , strtotime( $vivienda[0]['VIV_FECHA'])) ?>)</center></th>
                        </tr>
                        <tr>
                            <td colspan="6">CONDOMINIO <?= $vivienda[0]['VIV_NUM_VIV'] ?> (<?= $visitas[0]['VIS_NOMBRE'] ?>) 
                        </td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>NOMBRE</th>
                            <th>DPI</th>
                            <th>HORA DE ENTRADA</th>
                            <th>HORA DE SALIDA</th>
                            
                        </tr>
                        <?php if(count($visitas) > 0):?>

                        <?php foreach($visitas as $key => $visita) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $visita['VIS_NOMBRE'] ?></td>
                            <td><?= $visita['VIS_DPI'] ?></td>
                            <td><?= $visita['VIS_H_ENTRADA'] ?></td>
                            <td><?= $visita['VIS_H_SALIDA'] ?></td>
                            
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="6"><center>SIN VISITAS</center></td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>