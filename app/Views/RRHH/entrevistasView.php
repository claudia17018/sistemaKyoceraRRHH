<?= $this->extend('Plantilla/base') ?>
<?= $this->section('titulo') ?><?= $this->endSection() ?>
<main>
    <?= $this->section('contenido') ?>

    <?php
    $sol = $solicitante['datosSolicitante'];
    $estPro = $estadoProceso['datosEstadoProceso'];
    $dat = $datosCand['datosCandidato']; ?>

    <div class="container-md">
        <br>
        <table class="table-borderless">
            <tbody>
                <tr>
                    <td rowspan="2">
                        <?php if ($dat['URLFOTOCANDIDATO'] != NULL||$dat['URLFOTOCANDIDATO'] ==" ") : ?>
                            <img src="<?= $dat['URLFOTOCANDIDATO']; ?>" width="150px" height="150px">
                        <?php endif;
                        if ($dat['URLFOTOCANDIDATO'] == NULL) : ?>
                            <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" width="150px" height="150px">
                        <?php endif; ?>
                    </td>
                    <td style="width:10%;"></td>
                    <td>
                        <h2><label><?= $sol['PRIMERNOMBRESOLICITANTE'] ?> <?= $sol['SEGUNDONOMBRESOLICITANTE'] ?> <?=
                                                                                                                $sol['PRIMERAPELLIDOSOLICITANTE'] ?> <?= $sol['SEGUNDOAPELLIDOSOLICITANTE'] ?> </label></h2>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="col-md-4">Seleccionado
                        <i class="bi-check-circle" style="color: red"></i>
                    </td>
                    <td class="col-auto"></td>
                    <td>Fase actual del proceso</td>
                    <td style="width:5%;"></td>
                    <td><label><?= $estPro['ESTADOPROCESO'] ?></label></td>
                </tr>
            </tbody>
        </table>
        <br>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black">RESUMEN&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black">SOLICITUD EMPLEO&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">ENTREVISTAS&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black">PRUEBAS&nbsp;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" style="background-color: white; padding-left: 30px; padding-right: 30px">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary bi-plus-lg" type="button" href="<?= base_url('RRHH/nuevaEntrevista/' . $sol['IDSOLICITANTE']); ?>"> Nueva</a>
            </div>
            <span style="align-items: center;">N?? de entrevistas:
                <label><?= count($entrevistas['datosEntrevista']); ?></label>
            </span>
            <br><br>

            <?php foreach ($entrevistas['datosEntrevista'] as $entrevista) : ?>
                <div id="datosEntrevistas" class="container-md border border-secondary" style="border-radius:5px; padding-left:25px; padding-right:25px; padding-top:15px; ">
                    <p><b><?= $entrevista['TITULOENTREVISTA'] ?></b>
                        <span style="font-size:18px; float:right;">
                            <a class="bi-pencil-fill me-md-1" href="<?= base_url('RRHH/editarEntrevista/' . $entrevista['IDENTREVISTA'] . '/' . $sol['IDSOLICITANTE']); ?>"></a>
                            <a class="bi-x-circle" style="color: red;" href="<?= base_url('RRHH/eliminarEntrevista/' . $entrevista['IDENTREVISTA'] . '/' . $sol['IDSOLICITANTE']); ?>"></a>
                        </span>
                        <br>
                    <div class="row g-3">
                        <div class="col-auto">
                            <label>Desde: <?= $entrevista['HORAINICIO'] ?></label>
                        </div>
                        <div class="col-md-4">
                            <label>Hasta: <?= $entrevista['HORAFINALIZACION'] ?></label>
                        </div>
                        <div class="col-md-4">
                            <label><?= $entrevista['FECHAENTREVISTA'] ?></label>
                        </div>
                        <div class="col-auto">
                            <label><?= $entrevista['MODALIDADENTREVISTA'] ?></label>
                        </div>

                        <div class="container-fluid mb-3">
                            <p><?= $entrevista['DESCRIPCIONENTREVISTA'] ?></p>

                            <label for="exampleFormControlTextarea1" class="form-label">Comentarios&nbsp;</label>
                            <a class="bi-plus-square-fill" style="font-size:18px;" href="<?= base_url('RRHH/nuevoComentario/' . $entrevista['IDENTREVISTA'] . '/' . $sol['IDSOLICITANTE']); ?>"></a>

                            <?php foreach ($comentarios['datosComentario'] as $comentario) :
                                if ($entrevista['IDENTREVISTA'] == $comentario['IDENTREVISTA']) : ?>
                                    <textarea class="form-control border-2" rows="3" style="background-color: whitesmoke;" disabled><?= $comentario['COMENTARIOS'] ?>
                                        </textarea><br>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <br><br>
            <?php endforeach; ?>
        </div>
    </div>
    
</main>
<?= $this->endSection() ?>