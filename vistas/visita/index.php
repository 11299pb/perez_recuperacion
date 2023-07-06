<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <br><div class="container">
        
        <div class="row justify-content-center">
            <form action="/perez_recuperacion/controladores/visita/guardar.php" method="POST" class="col-lg-8 border bg-light p-3" style="font-family: 'Arial', sans-serif; color: #333;">
                <div class="row mb-3">
                    <div class="col">
                    <h1 class="text-center" style="font-family: 'Arial', sans-serif; color: #333;">FORMULARIO INGRESO DE VISITAS</h1>
                        <BR><label for="vis_nombre" style="color: #333;">Nombre de la visita</label>
                        <input type="text" name="vis_nombre" id="vis_nombre" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_dpi" style="color: #333;">No. de DPI</label>
                        <input type="number" name="vis_dpi" id="vis_dpi" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_ingreso" style="color: #333;">Hora de Ingreso</label>
                        <input type="time" name="vis_h_ingreso" id="vis_h_ingreso" class="form-control" style="border-color: #ced4da;">
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_salida" style="color: #333;">Hora de salida</label>
                        <input type="time" name="vis_h_salida" id="vis_h_salida" class="form-control" style="border-color: #ced4da;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #17a2b8; border-color: #17a2b8;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>
<style>
    body {
        background-color: #f8f9fa;
    }
</style>