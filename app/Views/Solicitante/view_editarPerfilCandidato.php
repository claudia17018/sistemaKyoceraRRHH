<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?><?= $this->endSection() ?>
    <main> 
        <?= $this->section('contenido')?>     
   
        <h2 class= "pt-3" style="padding-left: 3%;  color: darkblue;">Mi Perfil</h2>
        <div class="container border pt-4 mt-4" style="background-color: white; padding-left: 3%;">
        <div class="container-fluid" >
            <h2>Editar Perfil</h2><br>
        </div>
    
        <div class="container-fluid border-top border-2" style="color: darkblue; ">
        <form method="POST" action="<?=site_url('User/guardar/'.$solicitante['IDSOLICITANTE']);?>" class="" id="userEdit" name="userEdit">
            <br>
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="priNomSolicitante">Primer Nombre</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="priNomSolicitante" name="priNomSolicitante" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['PRIMERNOMBRESOLICITANTE']?>">
                </div>
        
                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="segNomSolicitante">Segundo Nombre</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="segNomSolicitante" name="segNomSolicitante" 
                           class="form-control" autofocus="" required 
                           value="<?=$solicitante['SEGUNDONOMBRESOLICITANTE']?>">
                </div>
            </div>
            <br>
            
            <div class="md-2 row">
                <div class="col-sm-5">
                    <label class="" for="priApeSolicitante">Primer Apellido</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="priApeSolicitante" name="priApeSolicitante" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['PRIMERAPELLIDOSOLICITANTE']?>">
                </div>

                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="segApeSolicitante">Segundo Apellido</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="segApeSolicitante" name="segApeSolicitante" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['SEGUNDOAPELLIDOSOLICITANTE']?>">
                </div>
            </div>
            <br>
        
            <div class="col-sm-11">
                <label for="correoAspirante">Correo Electronico</label>
                <span class=""><i class=""></i></span>
                <input type="email" id="correoAspirante" name="correoAspirante" class="form-control"
                       autofocus="" required placeholder="correo@ejemplo.com" value="<?=$correo['CONTACTOSOLICITANTE']?>">
            </div>
            <br>
        
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="fechaNacimiento">Fecha de nacimiento</label>
                    <span class=""><i class=""></i></span>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['SOLICITANTEFECHANACIMIENTO']?>">
                </div>
            
                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="duiAspirante">DUI</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="duiSolicitante" name="duiSolicitante" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['DUI']?>" disabled>
                </div>
            </div>
            <br>
        
            <div class="md-3 row">

                <div class="col-sm-5">
                    <label class="" for="genero">Genero</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="genero" name="genero" class="form-control" 
                           autofocus="" required value="<?=$solicitante['GENEROSOLICITANTE']?>">
                </div>

                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="nitAspirante">NIT</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="nitAspirante" name="nitAspirante" 
                           class="form-control" autofocus="" required
                           value="<?=$solicitante['NIT']?>" disabled>
                </div>
            </div>
            <br>
        
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="nivelAcademico">Nivel Academico</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="nivelAcademico" name="nivelAcademico" class="form-control" 
                           autofocus="" required value="<?=$educacion['NIVELDEEDUCACION']?>">
                </div>
            </div>
            <br>
 
            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>
        <br>
        <br>
        </div>
        </div>
    </main>
   <?= $this->endSection() ?>