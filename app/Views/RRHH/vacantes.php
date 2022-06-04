<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">


    <!--<?php print_r($vacantes); ?>-->
    <table class="">

        <div class="row mb-3">
            <div class="col  ">
                <h4>Mis Vacantes</h4>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <label>Activas 10</label>
            </div>
            <div class="col-md-5">
                <label>Inactivas 1</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">

                <button class="btn btn-primary button__primary" type="submit"><i class="bi bi-plus"></i> Nueva</button>

            </div>
            <div class="col-md-8">
                <div class="header2__search">
                    <input type="search" class="header2__input">
                    <i class="bi bi-search"></i>
                </div>
            </div>

            <div class="col-md-2 justify-content-end">

                <button class="btn btn-primary button__primary" type="submit"><i class="bi bi-filter"></i> Filtrar</button>

            </div>
        </div>




        <table class="table table-hover tabla__color">
            <thead class="thead-dark">
                <tr>
                    <th scope="col prueba" class="col-md-1">#</th>
                    <th scope="col" class="col-md-2">Fecha de creación</th>
                    <th scope="col" class="col-md-5 ">Vacante</th>
                    <th scope="col" class="col-md-2">Plazas</th>
                    <th scope="col" class="col-md-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 1;
                foreach ($vacantes as $vacante) {

                    echo  ' <tr class="table__tr">
                                <td>' . $contador . '</td>
                                <td>' . $vacante['CREATED_AT'] . '</td>
                                <td class="text-start">' . $vacante['NOMBREVACANTE'] . '</td>
                                <td>' . $vacante['NUMEROVACANTES'] . '</td>
                                <td>
                                    <button class="bi bi-eye-fill  view_icon"></button>
                                    <button class="bi bi-pencil-square  edit_icon"></button>
                                    <button class="bi bi-trash-fill  delete_icon"></button>
                                </td>
                            </tr>';
                    $contador = $contador + 1;
                } ?>
            </tbody>
        </table>



    </table>
</div>
<?= $this->endSection() ?>