<?= $this->extend('Plantilla/baseSolicitante') ?>
<?= $this->section('titulo') ?>Postulacion<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
<div class="container-md">
 <h3 class="py-1">Mi postulacion</h3>
 <br>
    <div class="card p-2">
      <div class="card-body">
        <form name="registro" method="POST" enctype="multipart/form-data" action="<?= site_url('postular/up')?>">
            <div class="md-3 row">
              <div class="col-sm-5">
                    <label for="pretensionSalarial">Pretensi&oacute;n salarial</label>
                    <input type="text" name="pretensionSalarial" id="pretensionSalarial" required class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="dui">DUI</label>
                    <input type="file" name="dui" class="form-control">
                </div>            
            </div>
            <br>              
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="curriculum">Curriculum</label>
                    <input type="file" name="curriculum" id="Curriculum" required  class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="nit">NIT</label>
                    <input type="file" name="nit"  class="form-control" id="nit">
                </div>
            </div>
            <br>
            <div class="">
                <label for="">Recomendado por empleado de AVX</label>
                    <input class ="" id="si" name="recomendado" value="si" type="radio">Si   
                    <input id="no" name="recomendado" value="no" type="radio" checked="true">No    
            </div>
            <br>
            <div id="datosRecomendado" style="display:block">
            <div class="md-3 row">
                <div class="col-sm-5">
                   <label for="nombreRecomienda" id="nombreRecomienda">Nombre del empleado que lo recomienda</label>
                    <input type="text" name="nombreRecomienda" id="nombreRecomienda" class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="apellidoRecomienda" id="apellidoRecomienda">Apellido del empleado que recomienda</label>
                    <input type="text" name="apellidoRecomienda" id="apellidoRecomienda" class="form-control">
                </div>
            </div>
            <br>
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label for="badgeRecomienda" id="badgeRecomienda">Numero de Badge del empleado que recomienda</label>
                    <input type="text" name="badgeRecomienda" id="badgefonoRecomienda" class="form-control">
                </div>
                <div class="col-sm-5">
                    <label for="telRecomienda" id="telRecomienda">Numero de telefono del empleado que recomienda</label>
                    <input type="text" name="telRecomienda" id="telRecomienda" class="form-control">
                </div>
            </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary" style="width:50%;" type="submit">Postularme</button>
            </div>
        </form>
      </div>
    </div> 
</div>
<?= $this->endSection() ?>
<?= $this->section('js')?>
<script>
    const d= document;
    let radios= d.querySelectorAll('input[type=radio][name="recomendado"]');
    let labels = d.querySelectorAll('label');
    console.log(labels);
    radios.forEach(radio => radio.addEventListener('change', () => {
        if(radio.value==="si"){
          showlabelInput();
        }else{
         hideLabelInput();     
        }
    }));

    let hideLabelInput = () =>{
    for (let i = 0, label; label = labels[i++];) {
        let nodoSiguiente = label.nextElementSibling;
        if(label.id == 'nombreRecomienda' || label.id=='apellidoRecomienda'|| label.id == 'badgeRecomienda'|| label.id=='telRecomienda'){  
          label.style.display = 'none';
          nodoSiguiente.style.display = 'none';  
    } 
  }
}
 let showlabelInput = () =>{
    for (let i = 0, label; label = labels[i++];) {
        let nodoSiguiente = label.nextElementSibling;
        if(label.id == 'nombreRecomienda'  || label.id=='apellidoRecomienda'|| label.id == 'badgeRecomienda'|| label.id=='telRecomienda'){  
          label.style.display = 'block';
          nodoSiguiente.style.display = 'block';  
    } 
  }
}
hideLabelInput();
</script>
<?= $this->endSection()?>