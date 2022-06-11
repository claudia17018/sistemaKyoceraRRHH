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
                    <td><form  action="<?php echo base_url('Solicitante/Solicitante/estadoPostulante'); ?>" method="POST">Estado&nbsp;</td>
                     <td>   
                    <select id="estado" class="form-select" aria-label="Default select example">
                        <option disabled selected>Selecciona el estado del candidato</option>
                        <?php foreach($estado as $e): ?>
                              <option value="<?=$e->IDESTADOPOSTULANTE ?>"><?=$e->TIPOESTADO ?></option>
                        <?php endforeach;?>  
                    </select>
                     </form>
                  </td>
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
                    <td style="width:5%;"></td>
                    <td>
                    <p><b>Apellidos:</b>&nbsp;<?php echo $solicitante['PRIMERAPELLIDOSOLICITANTE'].' '.$solicitante['SEGUNDOAPELLIDOSOLICITANTE'].' '; ?></p>
                    </td>
                    <td style="width:30%;"></td>
                    <td><button type="button" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver CV</button></td>
                </tr>
                 <tr>
                    <td>
                        <p><b>Fecha de nacimiento:</b>&nbsp;<?php $fecha=date_create($solicitante['SOLICITANTEFECHANACIMIENTO']); echo date_format($fecha,"d/m/Y");?> </p>
                    </td>
                    <td style="width:5%;"></td>
                    <td>
                    <p><b>Edad:</b>&nbsp;<?php $fecha=date_create($solicitante['SOLICITANTEFECHANACIMIENTO']); $ahora = new DateTime(date("Y-m-d")); $diferencia = $ahora->diff($fecha); print_r($diferencia->format("%y"));?></p>
                    </td>
                    <td style="width:30%;"></td>
                    <td><button type="button" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver Titulo</button></td>
                </tr>
                <tr>
                 <td><p><b>G&eacute;nero:</b>&nbsp;<?php echo $solicitante['GENEROSOLICITANTE'] ?></td></p>
                 <td style="width:5%;"></td>
                 <td><p><b>DUI:&nbsp;</b><?php echo $solicitante['DUI'] ?></td></p>
                <td style="width:30%;"></td>
                    <td><button type="button" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver DUI</button></td>
                </tr>
                <tr>
                    <td>
                        <p><b>Pretensi&oacute;n salarial:</b>&nbsp;<?php echo ''?> </p>
                    </td>
                    <td style="width:5%;"></td>
                    <td>
                    <p><b>NIT:</b>&nbsp;<?php echo $solicitante['NIT'] ?></p>
                    </td>
                     <td style="width:30%;"></td>
                    <td><button type="button" style="width:80px;" class="btn btn-outline-primary btn-sm">Ver NIT</button></td>
                </tr>
                 <tr>
                    <td>
                        <p><b>Nivel acad&eacute;mico</b>:</b>&nbsp;<?php echo ''?> </p>
                    </td>
                    <td style="width:5%;"></td>
                    <td>
                    <p><b>Recomendado:</b>&nbsp;<?php echo '' ?></p>
                    </td>
                     <td style="width:30%;"></td> 
                </tr>
            </tbody>
            </table>
        </div>         
    </div>        
<?= $this->endSection() ?>
<?= $this->section('js')?>
<script src="<?php echo base_url('public/assets/js/enchanter.js'); ?>"></script>
<script>
    const selectElement = document.getElementById('estado')
  
    selectElement.addEventListener('change', (event) => {
    const resultado=  `${event.target.value}`;
    <?php echo base_url('Solicitante/Solicitante/'); ?>
});

</script>
<?= $this->endSection()?>
          
      