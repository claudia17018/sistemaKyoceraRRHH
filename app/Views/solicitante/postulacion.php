<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?>Postulacion<?= $this->endSection() ?>
<?= $this->section('contenido') ?>

<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="col-xxl-10 col-lg-6 col-md-8col-sm-12 container border pt-5 mt-5">
    <div>
        <h2>Mi postulacion</h2>
    </div>
    <br>
    <div class="">
        <form name="registro" method="POST" enctype="multipart/form-data" action="<?= site_url('postular/up')?>">
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label for="pretensionSalarial">Pretension salarial</label>
                    <input type="text" name="pretensionSalarial" id="pretensionSalarial"  require class="form-control">
                </div>
                <div class="col-sm-2">
                    <label for="dui">DUI</label>
                    <input type="file" name="dui" class="form-control">
                </div>
                
            </div>
            <br>
               
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="curriculum">Curriculum</label>
                    <input type="file" name="curriculum" id="Curriculum" class="form-control">
                </div>
                <div class="col-sm-2">
                    <label for="nit">NIT</label>
                    <input type="file" name="nit" id="nit" class="form-control">
                </div>
            </div>
            <br>
            <div class="">
                <label for="">Recomendado por empleado de AVX</label>
                    <input class ="" id="si" name="recomendado" value="si" type="radio" checked="true" onclick="recomendado()">Si   
                    <input id="no" name="recomendado" value="no" type="radio" onclick="recomendado()">No    
            </div>
            <br>
            <div id="datosRecomendado" style="display:block">
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label for="nombreRecomienda">Nombre del empleado que lo recomienda</label>
                    <input type="text" name="nombreRecomienda" id="nombreRecomienda" class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="apellidoRecomienda">Apellido del empleado que recomienda</label>
                    <input type="text" name="apellidoRecomienda" id="apellidoRecomienda" class="form-control">
                </div>
            </div>
            <br>
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label for="badgeRecomienda">Numero de Badge del empleado que recomienda</label>
                    <input type="text" name="badgeRecomienda" id="badgefonoRecomienda" class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="telRecomienda">Numero de telefono del empleado que recomienda</label>
                    <input type="text" name="telRecomienda" id="telRecomienda" class="form-control">
                </div>
            </div>
            </div>
            <br>
            <div>
                <button class="btn btn-primary" type="submit">Postularme</button>
            </div>
        </form>
    </div>
    <script>
            function recomendado(){
                if(document.registro.recomendado[0].checked == false){
                    document.getElementById('datosRecomendado').style.display='none';
                }else{
                    document.getElementById('datosRecomendado').style.display='block';
                }         
            }
    </script>
    </div>
</body>    

<?= $this->endSection() ?>