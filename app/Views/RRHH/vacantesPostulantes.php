<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">


    <div class="row mb-3">
        <div class="col  ">
            <h4>Vacantes: <?= $vacante['NOMBREVACANTE'] ?></h4>
        </div>

    </div>


    <div class="table-responsive-xxl">

        <table class="table table-hover tabla__color table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col prueba" class="col-md-2">#</th>
                    <th scope="col" class="col-md-4">Candidatos</th>
                    <th scope="col" class="col-md-2 overflow-auto"></th>
                    <th scope="col" class="col-md-3">Postulacion</th>

                </tr>
            </thead>

            <tbody>
                <?php $contador = 1;
                foreach ($fechaPos as $fe) : ?>



                    <tr class="table__tr ">

                        <td><?= $contador; ?></td>
                        <?php foreach ($pos as $os) :
                            if ($fe['IDSOLICITANTE'] == $os['IDSOLICITANTE']) {
                                $p1 = $os['PRIMERNOMBRESOLICITANTE'];
                                $p2 = $os['SEGUNDONOMBRESOLICITANTE'];
                                $a1 = $os['PRIMERAPELLIDOSOLICITANTE'];
                                $a2 = $os['SEGUNDOAPELLIDOSOLICITANTE'];
                                $idSol = $os['IDSOLICITANTE'];
                            }
                        ?>
                        <?php endforeach; ?>
                        <td class="text-start"><?= $p1 ?> <?= $p2 ?> <?= $a1 ?> <?= $a2 ?></td>

                        <td>

                            <a href="<?= base_url('AdminRH/prueba/' . $idSol) ?>">
                                <button class="bi bi-eye-fill  view_icon"></button>
                            </a>
                        </td>
                        <td><?= $fe['FECHAPOSTULACION'] ?> </td>



                    </tr>

                <?php $contador = $contador + 1;
                endforeach; ?>
            </tbody>

        </table>
    </div>




</div>
<?= $this->endSection() ?>