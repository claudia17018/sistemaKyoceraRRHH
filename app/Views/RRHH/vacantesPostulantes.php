<?= $this->extend('Plantilla/base') ?>
<?= $this->section('contenido') ?>
<div class="container-fluid  p-4">


   


    <div class="row mb-3">
        <div class="col  ">
            <h4>Mis Vacantes</h4>
        </div>

    </div>



    <div class="row mb-3">

        <div class="col-md-8">
            <form action="" method="post" class="form">
                <div class="header2__search">

                    <input type="search" class="header2__input" name="busqueda">
                    <i class="bi bi-search"></i>

                </div>
            </form>
        </div>


    </div>
</div>
<?= $this->endSection() ?>