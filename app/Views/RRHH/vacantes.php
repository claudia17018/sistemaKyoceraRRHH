<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">


    <!--<?php print_r($vacantes); ?>-->


    <div class="row mb-3">
        <div class="col  ">
            <h4>Mis Vacantes</h4>
        </div>

    </div>
    <?php $c_activos = 0;
    $c_inactivos=0;
    foreach ($vacantes as $vacante){
        if($vacante['ESTADOVACANTE']=="Activo"){
            $c_activos++;
        }else{
            $c_inactivos++;
        }
        } ?>

    <div class="row mb-3">
        <div class="col-md-2">
            <label>Activas <?=$c_activos?></label>
        </div>
        <div class="col-md-5">
            <label>Inactivas <?=$c_inactivos?></label>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-2">
            <a href="<?= base_url('AdminRH/crearVacantes') ?>" class="nav__link">
                <button class="btn btn-primary button__primary" type="submit"><i class="bi bi-plus"></i> Nueva</button>
            </a>
        </div>
        <div class="col-md-8">
            <form action="" method="post" class="form">
                <div class="header2__search">

                    <input type="search" class="header2__input" name="busqueda">
                    <i class="bi bi-search"></i>

                </div>
            </form>
        </div>

        <div class="col-md-2 justify-content-end">

            <button class="btn btn-primary button__primary" type="submit"><i class="bi bi-filter"></i> Ordenar</button>

        </div>
    </div>


    <div class="table-responsive-xxl">

        <table class="table table-hover tabla__color table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col prueba" class="col-md-1">#</th>
                    <th scope="col" class="col-md-2">Fecha de creación</th>
                    <th scope="col" class="col-md-4 overflow-auto">Vacante</th>
                    <th scope="col" class="col-md-2">Plazas</th>
                    <th scope="col" class="col-md-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php $contador = 1;
                foreach ($vacantes as $vacante) : ?>



                    <tr class="table__tr ">

                        <td><?= $contador; ?></td>
                        <td><?= $vacante['CREATED_AT'] ?></td>
                        <td class="text-start">
                            <a class="text-break" href="<?= base_url('AdminRH/postulantesVacantes/' . $vacante['IDVACANTE']) ?>"><?= $vacante['NOMBREVACANTE'] ?></a>
                        </td>
                        <td><?= $vacante['NUMEROVACANTES'] ?> </td>

                        <td>
                            <a href="<?= base_url('AdminRH/verVacantes/' . $vacante['IDVACANTE']) ?>">
                                <button class="bi bi-eye-fill  view_icon"></button>
                            </a>
                            <a href="<?= base_url('AdminRH/editarVacantes/' . $vacante['IDVACANTE']) ?>">
                                <button class="bi bi-pencil-square  edit_icon"></button>
                            </a>
                            <a href="<?= base_url('AdminRH/borrarVacantes/' . $vacante['IDVACANTE']); ?>">
                                <button class="bi bi-trash-fill  delete_icon"></button>
                            </a>
                            <a href="<?= base_url('AdminRH/estadoVacantes/' . $vacante['IDVACANTE']); ?>">
                                <button title="<?= $vacante['ESTADOVACANTE'] ?>" class="bi bi-check-circle  view_<?= $vacante['ESTADOVACANTE'] ?>"></button>
                            </a>
                        </td>

                    </tr>

                <?php $contador = $contador + 1;
                endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
<?= $this->endSection() ?>