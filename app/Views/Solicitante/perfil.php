<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?>Mi perfil<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
<div class="container-md" >
 <h5 class="mb-3">Mi perfil</h5>
  <div class="container py-2 h-100">
    <div class="card mb-5" style="border-radius: 15px;">
       <div class="card-body p-4">
          <table class="table-borderless"> 
            <tbody>
                <tr>    
                    <td rowspan="2">
                        <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" width="100px" height="100px">
                    </td>
                    <td style="width:5%;"></td>
                    <td colspan="2"><h3><?php echo $user['PRIMERNOMBRESOLICITANTE'].' '.$user['SEGUNDONOMBRESOLICITANTE'].' '.$user['PRIMERAPELLIDOSOLICITANTE'].' '.' '.$user['SEGUNDOAPELLIDOSOLICITANTE']; ?></h3></td>
                    <td style="width:52%;"></td>
                    <td><a href="<?php echo base_url('editar/'.$user['IDSOLICITANTE']);?>" class="btn btn-primary"><i class="bi bi-pencil text-light"></i>&nbsp;&nbsp;Editar</a>
                </tr>
                <tr>
                    <td style="width:5%;"></td>
                    <td><i style="font-size:1.3rem;" class="bi bi-envelope"></i></td>
                     <td><?php print_r('');?></td>
                </tr>
            </tbody>
        </table>
        <hr class="my-4">
          <table class="table-borderless">
               <tbody>
                 <tr>
                    <td><p><b>G&eacute;nero:</b>&nbsp;<?php echo $user['GENEROSOLICITANTE'] ?></td></p>
                    <td style="width:15%;"></td>
                    <td><p><b>Fecha de nacimiento:</b>&nbsp;<?php $fecha=date_create($user['SOLICITANTEFECHANACIMIENTO']); echo date_format($fecha,"d/m/Y");?> </p></td>
                </tr>
                <tr>
                 <td><p><b>N&uacute;mero de DUI:&nbsp;</b><?php echo $user['DUI'] ?></p></td>
                   <td style="width:5%;"></td>
                   <td>
                    <p><b>N&uacute;mero de NIT:</b>&nbsp;<?php echo $user['NIT'] ?></p>
                    </td>        
                </tr>
                 <tr>
                    <td>
                        <p><b>Nivel acad&eacute;mico</b>:</b>&nbsp;<?php echo ''?> </p>
                    </td>
                </tr>
            </tbody>
            </table>
      </div>
    </div> 
  </div>
</div>
<?= $this->endSection() ?>
