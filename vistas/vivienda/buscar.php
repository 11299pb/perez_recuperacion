<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">BUSCAR VISITA</h1>
        <div class="row justify-content-center">
            <form action="/perez_recuperacion/controladores/vivienda/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="venta_fecha">INGRESE FECHA DE LA VISITA</label>
                        <input type="date-local" value="<?= date('Y-m-d') ?>" name="venta_fecha" id="venta_fecha" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>