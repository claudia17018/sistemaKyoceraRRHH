<?= $this->extend('Plantilla/base') ?>
<?= $this->section('titulo') ?><?= $this->endSection() ?>
    <main> 
        <?= $this->section('contenido')?>   
  
   <div class="col-xxl-6 col-lg-10 col-md-8col-sm-12 container border pt-5 mt-5" style="background-color: white">
        <div class="container-fluid" >
            <h2>Nuevo comentario</h2><br>
    </div>
    
    <div class="">
    <form method="POST" action="<?=site_url('AdminRH/guardarComentario/'.$entrevista['IDENTREVISTA'].'/'.$solicitante['IDSOLICITANTE']);?>" class="" id="comentarioAgregar" name="comentarioAgregar">
        <div class="container-md" style="padding-left: 40px; padding-right: 40px">
           
            <div class="mb-3">
                <label for="newComent" class="form-label"><b><?=$entrevista['TITULOENTREVISTA']?></b></label><br><br>
                <textarea id="newComent" name="newComent" class="form-control" rows="3" autofocus="" require=""></textarea>
                </div>
            <br>
        </div>
            <br>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
    <br>
    <br>
    </div>
   </div>
       </main>
        
 <?= $this->endSection() ?>
