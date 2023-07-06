<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php

require '../../modelos/vivienda.php';

    try {
   
   $fecha = date('d/m/Y');
   $buscar = new Cita();

   $busqueda= $buscar->busqueda();

    } catch (PDOException $e) {
        $error = $e->getMessage();
    } 
?>
<br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-responsive">
                <table class="table table-bordered custom-bordered-table">
                    <thead>
                        <tr class="text-center table-primary">
                            
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center table-dark">
                        <td colspan="6"><center>Registro de Datos de cada vivienda (<?= $fecha ?>)</center></td>
                    </tr>
                    <?php if (!empty($busqueda)): ?>
                        <?php $viviendaActual = ''; $visitaActual = ''; ?>
                        <?php foreach ($busqueda as $key => $fila) : ?>
                            <?php if ($viviendaActual != $fila['VIV_NOMBRE'] || $visitaActual != $fila['VIS_NOMBRE']): ?>
                                <?php if ($key > 0): ?>
                                    </tbody>
                                    </table>
                                <?php endif; ?>
                                <table class="table table-pink">
                                    <thead>
                                        <tr class="text-center table-pink">
                                            <th colspan="6">VIVIENDA: <?= $fila['VIV_NOMBRE'] ?> (<?= $fila['VIS_NOMBRE'] ?>)</th>
                                        </tr>
                                        <tr class="text-center table-secundary">
                                            <th>NO</th>
                                            <th>NUM. VIVIENDA</th>
                                            <th>NOMBRE DEL VISITANTE</th>
                                            <th>FECHA</th>
                                            <th>NOMBRE A QUIEN VISITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php endif; ?>
                            <tr class="text-center table-secondary">
                                <td><?= $key + 1 ?></td>
                                <td><?= $fila['VIV_NUM_VIV'] ?></td>
                                <td><?= $fila['VIV_NOMBRE'] ?></td>
                                <td><?= $fila['VIV_FECHA'] ?></td>
                                <td><?= $fila['VIV_VISITANTE'] ?></td>
                            </tr class="text-center table-primary">
                            <?php $viviendaActual = $fila['VIV_NOMBRE']; $visitaActual = $fila['VIS_NOMBRE']; ?>
                        <?php endforeach ?>
                        </tbody>
                        </table>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><center>SIN VISITAS</center></td>
                        </tr>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include_once '../../includes/footer.php'?>
<center>
<div class="row">
        <div class="col-lg-12">
            <a href="/perez_recuperacion/vistas/vivienda/index.php" class="btn btn-warning">Regresar al formulario</a>
        </div>
    </div></center>