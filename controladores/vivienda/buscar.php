<?php
require_once '../../modelos/vivienda.php';
require_once '../../modelos/visita.php';

try {
    $vivienda = new Vivienda();
    $viviendas = $vivienda->buscar();

    $visita = new Visita();
    $visitas = $visita->buscar();

  

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>RESULTADOS DE BUSQUEDA</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-green">
                        <tr>
                            <th>No.</th>
                            <th>Num. Vivienda</th>
                            <th>NOMBRE</th>
                            <th>FECHA</th>
                            <th>NOMBRE A QUIEN VISITA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($visitas) > 0) : ?>
                            <?php foreach ($visitas as $key => $visita) : ?>
                                <?php
                                    $vivienda = $viviendas[$key];
                                    
                                ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $visita['VIV_NUM_VIV'] ?></td>
                                    <td><?= $visita['VIV_NOMBRE'] ?></td>
                                    <td><?= $visita['VIV_FECHA'] ?></td>
                                    <td><?= $visita['VIV_VISITANTE'] ?></td>
                                    <td><a class="btn btn-warning w-100" href="/perez_recuperacion/vistas/citas/detalle.php?viv_nombre=<?= $cita['VIV_NOMBRE'] ?>">VER DETALLE</a></td>
                                    <td><a class="btn btn-danger w-100" href="/perez_recuperacion/controladores/citas/eliminar.php?viv_fecha=<?= $cita['VIV_FECHA'] ?>">ELIMINAR</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/perez_recuperacion/vistas/vivienda/detalle.php" class="btn btn-info w-100">VER VISITAS DE HOY</a><br><br>
                <a href="/perez_recuperacion/vistas/vivienda/buscar.php" class="btn btn-info w-100">REGRESAR A LA BUSQUEDA</a>
            </div>
        </div>
    </div>
</body>
</html>