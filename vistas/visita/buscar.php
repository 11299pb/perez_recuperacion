<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        
       <BR> <div class="row justify-content-center">
           <BR> <form action="/perez_recuperacion/controladores/visita/buscar.php" method="GET" class="col-lg-8 border bg-light p-3" style="font-family: 'Helvetica', sans-serif; color: #4d4d4d;">
                <div class="row mb-3">
                    <div class="col">
                    <h1 class="text-center" style="font-family: 'Helvetica', sans-serif; color: #4d4d4d;">BUSCAR VISITA</h1>
                        <label for="vis_nombre" style="color: #4d4d4d;">Nombre de la visita</label>
                        <input type="text" name="vis_nombre" id="vis_nombre" class="form-control" style="border-color: #6c757d;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_dpi" style="color: #4d4d4d;"></label>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100" style="background-color: #17a2b8; border-color: #17a2b8;">Buscar</button>
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
