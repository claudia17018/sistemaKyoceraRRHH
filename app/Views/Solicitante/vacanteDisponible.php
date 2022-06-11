<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?>Mi perfil<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
  
 <h4 class="py-1" style="color:#2B3674;">Vacantes disponibles</h4>
  <div class="container py-2">
    <div class="row">
    
      <div class="col-lg-9">
      <?php foreach($datos as $key):?>
        <br>
        <div class="card mb-8 mb-lg-0" style="border-radius: 10px;">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">

            
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fas fa-globe fa-lg text-warning"></i> -->
                <p class="mb-0"><?php echo $key->NOMBREVACANTE?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> -->
                <p class="mb-0"><?php echo $key->DESCRIPCIONVACANTE?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i> -->
                <p class="mb-0"> Estado: <?php echo $key->ESTADOVACANTE?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i> -->
                <p class="mb-0"><?php echo $key->NUMEROVACANTES?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <!-- <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i> -->
                <p class="mb-0"><?php echo $key->REQUERIMIENTOSPROPIOSVACANTE?></p>
              </li>
              

            </ul>
          </div>
        </div>
        <?php endforeach;?>
      </div>
      
      <div class="col-lg-3">
        <div class="card mb-4" style="border-radius: 15px;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Johnatan Smith</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
<?= $this->endSection()?>
