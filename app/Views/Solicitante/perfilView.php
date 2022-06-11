<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?><?= $this->endSection() ?>
    <main> 
        <?= $this->section('contenido')?>    
        
        <h2 class= "pt-3" style="padding-left: 3%;  color: darkblue;">Mi Perfil</h2>
        <div class="container border pt-4 mt-4" style="background-color: white; padding-left: 3%;">
        <div class="container-fluid">
            <div class=" md-3 row" >
   
                <div class="col-auto">
                    <?php if($datos['URLFOTOCANDIDATO'] != NULL):?>
                            <img src="<?=$datos['URLFOTOCANDIDATO'];?>" width="150px" height="150px">
                        <?php endif;
                         if($datos['URLFOTOCANDIDATO'] == NULL):?>
                            <img src="<?php echo base_url('public/assets/imagen/user.png');?>" width="150px" height="150px">
                            <?php endif;?>
                </div>

                <div class="col-md-8" style="padding-top: 3%">
                    <h2><label><?=$datosCandidato['PRIMERNOMBRESOLICITANTE'];?> <?=
                    $datosCandidato['SEGUNDONOMBRESOLICITANTE'];?> <?=$datosCandidato['PRIMERAPELLIDOSOLICITANTE'];?> <?=
                    $datosCandidato['SEGUNDOAPELLIDOSOLICITANTE'];?></label></h2>

                    <i class="bi-envelope"></i><label>&nbsp;<?=$correo['CONTACTOSOLICITANTE']?></label>
               </div>
              
                <div class="col-auto">
                    <a class="btn btn-primary bi-pencil-fill" type="button" 
                       href="<?=base_url('User/editar/'.$datosCandidato['IDSOLICITANTE']);?>"> Editar</button></a>
               </div>
            </div>
            <br>
        </div>
            
            <div class="container-fluid border-top border-2" style="padding: 2%; line-height: 2.5;">
              <div class=" md-3 row" >   
                    
                <div class="col-md-3">
                    <label>Fecha de nacimiento: </label>
                </div>
                <div class="col-md-9">
                    <label><?=$datosCandidato['SOLICITANTEFECHANACIMIENTO']?></label>
                </div>
                
                  
                <div class="col-md-3">
                    <label>Genero: </label>
                </div>
                <div class="col-md-9">
                    <label><?=$datosCandidato['GENEROSOLICITANTE']?></label>
                </div>

                  
                <div class="col-md-3">
                    <label>Nivel académico: </label>
                </div>
                <div class="col-md-9">
                    <label><?=$datosEducacion['NIVELDEEDUCACION']?> </label>
                </div>

                  
                <div class="col-md-3">
                    <label>Numero de DUI: </label>
                </div>
                <div class="col-md-8">
                    <label><?=$datosCandidato['DUI']?></label>
                </div>
                  
                <div class="col-md-3">
                    <label>Numero de NIT: </label>
                </div>
                <div class="col-md-8">
                    <label><?=$datosCandidato['NIT']?></label>
                </div>
            </div>
            </div>
            <br>
        </div>             
    </main>
    <?= $this->endSection() ?>
