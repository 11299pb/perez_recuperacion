<?php
require '../../modelos/visita.php';
try {
    $visita = new Visita($_GET);
    
    $visitas = $visita->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
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
    <title>Resultados de busqueda</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>DPI</th>
                            <th>HORA DE INGRESO</th>
                            <th>HORA DE SALIDA</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($visitas) > 0):?>
                        <?php foreach($visitas as $key => $visita) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $visita['VIS_NOMBRE'] ?></td>
                            <td><?= $visita['VIS_DPI'] ?></td>
                            <td><?= $visita['VIS_H_INGRESO'] ?></td>
                            <td><?= $visita['VIS_H_SALIDA'] ?></td>
                            
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/perez_recuperacion/vistas/visita/buscar.php" class="btn btn-info w-100">Volver a la busqueda</a>
            </div>
        </div>
    </div>
</body>
</html>