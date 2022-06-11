<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">
    <!--<?php print_r($vacanteEditar); ?>
<?php print_r($requerimientosvacanteEditar); ?>-->


    <div class="card border-right">
        <div class="card-body">
            <h4 class="card-title"><?=$vacanteEditar['NOMBREVACANTE']?></h4>
            <hr>
            <h5 class="card-title">Detalle de vacante</h5>
            <li>Genero: <?=$requerimientosvacanteEditar['GENEROCANDIDATO']?></li>
            <li>Edad: entre <?=$requerimientosvacanteEditar['EDADMINIMAREQUERIDA']?> y <?=$requerimientosvacanteEditar['EDADMAXIMAREQUERIDA']?></li>
            <li>Educaci&oacute;n m&iacute;nima: <?=$requerimientosvacanteEditar['NIVEL_ESTUDIO']?></li>
            <li>A&ntilde;os de experiencia requeridos: <?=$requerimientosvacanteEditar['EXPERIENCIALABORAL']?></li>
            <li>N&uacute;mero de plazas: <?=$vacanteEditar['NUMEROVACANTES']?></li>
            
           




        </div>
    </div>





</div>
<?= $this->endSection() ?>