<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?>Postulacion<?= $this->endSection() ?>
<?= $this->section('contenido') ?>

<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div>
        <h2>Mi postulacion</h2>
    </div>
    <br>
    <div class="">
        <form  method="POST" enctype="multipart/form-data" action="<?= site_url('postular/up')?>">
            <div class="">
                <div class="">
                    <label for="pretensionSalarial">Pretension salarial</label>
                    <input type="text" name="pretensionSalarial" id="pretensionSalarial">
                </div>
                <div class="mt-2">
                    <label for="dui">DUI</label>
                    <input type="file" name="dui" >
                </div>
                
            </div>
               
            <div class="mt-2">
                <label class="" for="curriculum">Curriculum</label>
                <input type="file" name="curriculum" id="Curriculum">

                <label for="nit">NIT</label>
                <input type="file" name="nit" id="nit">
            </div>
            <div class="mt-2">
                <label for="recomendado">Recomendado por empleado de AVX</label>
                    <input id="si" name="recomendado" type="radio">Si   
                    <input id="no" name="recomendado" type="radio">No    
                
            </div>
            <div class="">
                <label for="nombreRecomienda">Nombre del empleado que lo recomienda</label>
                <input type="text" name="nombreRecomienda" id="nombreRecomienda">

                <label for="badgeRecomienda">Numero de telefono del empleado que recomienda</label>
                <input type="text" name="badgeRecomienda" id="badgeRecomienda">
            </div>
            <div class="">
                <label for="telefonoRecomienda">Numero de telefono del empleado que recomienda</label>
                <input type="text" name="telefonoRecomienda" id="telefonoRecomienda">
            </div>

            <div>
                <button class="btn btn-primary" type="submit">Postularme</button>
            </div>
        </form>
    </div>
</body>    

<?= $this->endSection() ?>