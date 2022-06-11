<?= $this->extend('Plantilla/base') ?>
<?= $this->section('titulo') ?><?= $this->endSection() ?>
<main> 
    <?= $this->section('contenido')?>   
    
    <div class="col-xxl-6 col-lg-6 col-md-8 col-sm-12 container border pt-4 mt-5" style="background-color: white">
    <div class="container-fluid" >
        <h2>Editar Entrevista</h2><br>
    </div>
    
    <div class="">
    <form method="POST" action="<?=site_url('RRHH/guardarEntrevista/'.$datosEntrevista['IDENTREVISTA'].'/'.$datosPersonalRRHH['IDPERSONALRECURSOSHUMANOS'].'/'.$datosSolicitante['IDSOLICITANTE']);?>" 
          class="" id="editarEntrevista" name="editarEntrevista">
        <div class="container-md" style="padding-left: 5%; padding-right: 5%">
            <div class="mb-3">
                <label for="tituloEntrevista" class="form-label">Titulo de la entrevista</label>
                <input type="text" class="form-control" id="tituloEntrevista" name="tituloEntrevista" autofocus="" required
                       value="<?=$datosEntrevista['TITULOENTREVISTA']?>">
            </div>
                
            <div class="mb-3">
                <label for="descripcionEntrevista" class="form-label">Descripción de la entrevista</label>
                <textarea id="descripcionEntrevista" name="descripcionEntrevista" class="form-control" rows="5" 
                          autofocus="" required><?=$datosEntrevista['DESCRIPCIONENTREVISTA']?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="fechaEntrevista" class="form-label">Fecha de la entrevista</label>
                <input type="date" class="form-control" id="fechaEntrevista" name="fechaEntrevista" autofocus="" 
                       required" value="<?=$datosEntrevista['FECHAENTREVISTA']?>">
            </div>
            
            <div class="mb-3 row">
                <div class="col-sm-6">
                    <label for="horaInicio" class="form-label">Hora de inicio</label>
                    <input type="time" id="horaInicio" name="horaInicio" class="form-control" autofocus="" 
                           required value="<?=$datosEntrevista['HORAINICIO']?>">
                </div>
        
                <div class="col-sm-6">
                    <label for="horaFinalizacion" class="form-label">Hora de finalización</label>
                    <input type="time" id="horaFinalizacion" name="horaFinalizacion" class="form-control" autofocus="" 
                           required value="<?=$datosEntrevista['HORAFINALIZACION']?>">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="modalidadEntrevista" class="form-label">Modalidad de la entrevista</label>
                <input type="text" class="form-control" id="modalidadEntrevista" name="modalidadEntrevista" 
                       autofocus="" required value="<?=$datosEntrevista['MODALIDADENTREVISTA']?>">
            </div>
            
            <div class="mb-3">
                <label for="descripcionEntrevista" class="form-label">Participantes</label>
                
                <textarea id="participantes" name="participantes" class="form-control" rows="3" 
                          autofocus="" disabled>
<?=$datosPersonalRRHH['NOMBREEMPLEADORRHH']?>
            
<?=$datosSolicitante['PRIMERNOMBRESOLICITANTE']?> <?=$datosSolicitante['SEGUNDONOMBRESOLICITANTE']?> <?=
            $datosSolicitante['PRIMERAPELLIDOSOLICITANTE']?> <?=$datosSolicitante['SEGUNDOAPELLIDOSOLICITANTE']?></textarea>
            </div>
            <br>
            <button class="btn btn-primary bi-save" type="submit" style="float: right"> Guardar</button>
        </div>
        <br>
    </form>
    <br>
    <br>
    </div>
    </div> 
<?= $this->endSection() ?>
</main>  
