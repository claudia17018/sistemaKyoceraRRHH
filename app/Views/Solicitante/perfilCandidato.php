<?= $this->extend('Plantilla/base') ?>
<?= $this->section('titulo') ?>Inicio<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
  <div class="container-md" >
        <br>
        <table class="table-borderless"> 
            <tbody>
                <tr>    
                    <td rowspan="2">
                        <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" width="150px" height="150px">
                    </td>
                    <td style="width:5%;"></td>
                    <td colspan="2"><h3><?php echo $solicitante['PRIMERNOMBRESOLICITANTE'].' '.$solicitante['PRIMERAPELLIDOSOLICITANTE'].' '; ?></h3></td> 
                </tr>
                <tr>
                    <td></td>
                    <td>Estado&nbsp;</td>
                     <td>   
                    <form method="POST" action="<?php echo base_url('Solicitante/Solicitante/estadoPostulante'); ?>">
                    <select id="estado" class="form-select" aria-label="Default select example">
                        <option disabled selected>Selecciona el estado del candidato</option>
                        <?php foreach($estado as $e): ?>
                              <option value="<?=$e->IDESTADOPOSTULANTE ?>"><?=$e->TIPOESTADO ?></option>
                        <?php endforeach;?>  
                    </select>
                   </td>
                   <td style="width:2%;"></td>
                   <td><button type="submit" style="width:80px;" class="btn btn-primary">Aceptar</button></form></td>
                </tr>
            </tbody>
        </table>
        <br>    
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">     
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="step1-tab"  href="#step1"  data-bs-toggle="tab" style="color: blue">RESUMEN&nbsp;</a>
                </li>
            </ul>
        </div>
        </div>
        </nav>
         <div class="container-fluid" style="background-color: white; padding-left: 30px; padding-right: 30px">   
            <table class="table-borderless">
               <tbody>
                <tr>
                    <td>
                    <p><b>Nombre:</b>&nbsp;<?php echo $solicitante['PRIMERNOMBRESOLICITANTE'].' '.$solicitante['SEGUNDONOMBRESOLICITANTE'].' '; ?>   </p>
                    </td>
                    <td style="width:4%;"></td>
                    <td>
                    <p><b>Apellidos:</b>&nbsp;<?php echo $solicitante['PRIMERAPELLIDOSOLICITANTE'].' '.$solicitante['SEGUNDOAPELLIDOSOLICITANTE'].' '; ?></p>
                    </td>
                    <td style="width:30%;"></td>
                    <td><button type="submit" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver CV</button></td>
                </tr>
                 <tr>
                    <td style="width:30%;">
                        <p><b>Fecha de nacimiento:</b>&nbsp;<?php $fecha=date_create($solicitante['SOLICITANTEFECHANACIMIENTO']); echo date_format($fecha,"d/m/Y");?> </p>
                    </td>
                    <td style="width:4%;"></td>
                    <td>
                    <p><b>Edad:</b>&nbsp;<?php $fecha=date_create($solicitante['SOLICITANTEFECHANACIMIENTO']); $ahora = new DateTime(date("Y-m-d")); $diferencia = $ahora->diff($fecha); print_r($diferencia->format("%y").' '.'a&ntilde;os');?></p>
                    </td>
                    <td style="width:30%;"></td>
                    <td><button type="submit" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver Titulo</button></td>
                </tr>
                <tr>
                 <td><p><b>G&eacute;nero:</b>&nbsp;<?php echo $solicitante['GENEROSOLICITANTE'] ?></td></p>
                 <td style="width:4%;"></td>
                 <td><p><b>DUI:&nbsp;</b><?php echo $solicitante['DUI'] ?></td></p>
                <td style="width:30%;"></td>
                    <td><button type="submit" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver DUI</button></td>
                </tr>
                <tr>
                    <td>
                        <p><b>Pretensi&oacute;n salarial:</b>&nbsp;<?php print_r($postulacion['PRETENCIONSALARIAL'])?> </p>
                    </td>
                    <td style="width:4%;"></td>
                    <td>
                    <p><b>NIT:</b>&nbsp;<?php echo $solicitante['NIT'] ?></p>
                    </td>
                     <td style="width:30%;"></td>
                    <td><button type="submit" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver NIT</button></td>
                </tr>
                 <tr>
                    <td>
                        <p><b>Nivel acad&eacute;mico</b>:</b>&nbsp;<?php echo ''?> </p>
                    </td>
                    <td style="width:4%;"></td>
                    <td>
                    <p><b>Email:</b>&nbsp;<?php print_r($contacto['CONTACTOSOLICITANTE']) ?></p>
                    </td>
                     <td style="width:30%;"></td> 
                </tr>
                <tr>
                    <td>
                        <p><b>Recomendado</b>:</b>&nbsp;<?php if(empty($referencia)):{ print_r('No'); }else: print_r('Si');?> </p>
                    </td>
                    <td style="width:4%;"></td>
                    <td colspan="2">
                    <p><b>Nombre empleado:</b>&nbsp;<?php print_r($referencia['NOMBREEMPLEADO'].' '.$referencia['APELLIDOEMPLEADO']) ?></p>
                    </td>
                     <td style="width:20%;"></td> 
                </tr>
                <tr>
                    <td>
                        <p><b>Telefono empleado:</b>&nbsp;<?php print_r($referencia['TELEFONOEMPLEADO']) ?></p>
                    </td>
                    <td style="width:4%;"></td>
                    <td colspan="2">
                    <p><b>Badge empleado:</b>&nbsp;<?php print_r($referencia['BADGEEMPLEADO']) ?></p>
                    </td>
                     <td style="width:20%;"></td> 
                </tr>
                <?php endif ?>
            </tbody>
            </table>
        </div>         
    </div>        
<?= $this->endSection() ?>
<?= $this->section('js')?>
<script>
    const selectElement = document.getElementById('estado');
    selectElement.addEventListener('change', (event) => {
    const resultado=  `${event.target.value}`;
    console.log(resultado);
});

</script>
<?= $this->endSection()?>
          
      