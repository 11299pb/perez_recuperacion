<?php
require '../../modelos/visita.php';
try {
    if(isset($_GET['vis_id']) && $_GET['vis_id'] != ''){

        $vis_id = $_GET['vis_id'];
        $visita = new Visita(["vis_id" => $vis_id]);
        $visitas = $visita->buscar(); }
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">MODIFICACION DE VISITAS</h1>
        <div class="row justify-content-center">
            <form action="/perez_recuperacion/controladores/visita/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="vis_id" value="<?= $visitas[0]['VIS_ID'] ?>">

                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_nombre">NOMBRE DEL LA VISITA</label>
                        <input type="text" name="vis_nombre" id="vis_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_dpi">NUMERO DE DPI</label>
                        <input type="text" name="vis_dpi" id="vis_dpi" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_ingreso">HORA DE ENTRADA</label>
                        <input type="time" name="vis_h_ingreso" id="vis_h_ingreso" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="vis_h_salida">HORA DE SALIDA</label>
                        <input type="time" name="vis_h_salida" id="vis_h_salida" class="form-control" required>
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