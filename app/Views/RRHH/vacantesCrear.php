<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">

    <div class="card border-right">
        <div class="card-body">
            <h4 class="card-title pb-4">Crear vacante</h4>


            <form action="<?= site_url('AdminRH/guardarVacantes') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombreVC" class="form-label">Nombre*</label>
                    <input type="text" name="nombreVC" id="nombreVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                    <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                </div>
                <div class="mb-3">
                    <label for="descripcionVC" class="form-label">Descripción*</label>
                    <input type="text" name="descripcionVC" id="descripcionVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                    <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                </div>
                <div class="mb-3">
                    <label for="requerimientosVC" class="form-label">Requerimientos*</label>
                    <input type="text" name="requerimientosVC" id="requerimientosVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                    <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="numPlazasVC" class="form-label">Número de plazas*</label>
                        <input type="number" name="numPlazasVC" id="numPlazasVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>
                    <div class="col-md-6">
                        <label for="nivEstudioVC" class="form-label">Nivel de estudio*</label>
                        <input type="text" name="nivEstudioVC" id="nivEstudioVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="experienciaVC" class="form-label">Experiencia*</label>
                        <input type="text" name="experienciaVC" id="experienciaVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>
                    <div class="col-md-6">
                        <label for="generoVC" class="form-label">Genero*</label>
                        <input type="text" name="generoVC" id="generoVC" class="form-control" placeholder="" aria-describedby="helpId" required>
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>
                </div>
                <div class="row mb-3">
                    
                    <div class="col-md-6">
                        <label for="edadMinVC" class="form-label">Edad mínima requerida</label>
                        <input type="text" name="edadMinVC" id="edadMinVC" class="form-control" placeholder="" aria-describedby="helpId" pattern="[0-9]+"  title="Números enteros positivos">
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>
                    <div class="col-md-6">
                        <label for="edadMaxVC" class="form-label">Edad máxima requerida</label>
                        <input type="number" name="edadMaxVC" id="edadMaxVC" class="form-control" placeholder="" aria-describedby="helpId"  pattern="[0-9]+"  title="Números enteros positivos">
                        <!-- <small id="helpId" class="text-muted">Aqui debe colocar su nombre</small>-->
                    </div>


                </div>
                <div class="row mb-3">

                    <div class="col-md-6">
                        <a href="<?= base_url('AdminRH/vacantes') ?>" class="nav__link">
                            <button type="button" class="btn btn-primary button__primary">Cancelar</button>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary button__primary">Crear</button>
                    </div>
                </div>

            </form>
        </div>
    </div>





</div>
<?= $this->endSection() ?>