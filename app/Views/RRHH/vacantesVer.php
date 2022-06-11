<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">
    <!--<?php print_r($vacanteEditar); ?>
<?php print_r($requerimientosvacanteEditar); ?>-->


    <div class="card border-right">
        <div class="card-body">
            <h3 class="card-title"><?=$vacanteEditar['NOMBREVACANTE']?></h3>
            <hr>
            <br>
            <h5 class="card-title mb-3">Detalle de vacante</h5>
            <li>Genero: <?=$requerimientosvacanteEditar['GENEROCANDIDATO']?></li>
            <li>Edad: entre <?=$requerimientosvacanteEditar['EDADMINIMAREQUERIDA']?> y <?=$requerimientosvacanteEditar['EDADMAXIMAREQUERIDA']?></li>
            <li>Educaci&oacute;n m&iacute;nima: <?=$requerimientosvacanteEditar['NIVEL_ESTUDIO']?></li>
            <li>A&ntilde;os de experiencia requeridos: <?=$requerimientosvacanteEditar['EXPERIENCIALABORAL']?></li>
            <li>N&uacute;mero de plazas: <?=$vacanteEditar['NUMEROVACANTES']?></li>
           
            <h5 class="card-title mt-4 mb-3">Descripci&oacute;n</h5>
            <pre class="text-break estilo_text" ><?=$vacanteEditar['DESCRIPCIONVACANTE']?></pre>
            
            <h5 class="card-title mt-4 mb-3">Requisitos</h5>
            <pre class="text-break estilo_text"><?=$vacanteEditar['REQUERIMIENTOSPROPIOSVACANTE']?></pre>
           




        </div>
    </div>





</div>
<?= $this->endSection() ?>