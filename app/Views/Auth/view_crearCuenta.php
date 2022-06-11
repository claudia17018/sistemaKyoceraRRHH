<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KYOCERA AVX EL SALVADOR"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/public/assets/imagen/apple-touch-icon.png'); ?>" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/public/assets/imagen/favicon-32x32.png'); ?>" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/public/assets/imagen/favicon-16x16.png'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('/public/assets/fonts/fonts-min.css'); ?>" >
        <link rel="stylesheet" href="<?php echo base_url('/public/assets/css/avxElSalvador.min.css'); ?>" >
        <link rel="stylesheet" href="<?php echo base_url('/publicassets/css/styles.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/assets/css/bootstrap-icons/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/assets/css/index.css'); ?>">
    <title><?= $this->renderSection('titulo')?></title>
</head>
<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="col-xxl-6 col-lg-6 col-md-8col-sm-12 container border pt-5 mt-5" >
    <table class="">
    <div class="">
        <img class="" src="<?php echo base_url('/public/assets/imagen/KyoceraAVX.png'); ?>" alt="KyoceraAVX" width="400" height="157">
    </div>
    <div class="col-sm-6">
        <h1>Crea tu cuenta</h1>
    </div>
    
    <div class="">
    <form method="POST" enctype="multipart/form-data" action="<?= site_url('Auth/guardarAspirante')?>" class="" id="userCreate" name="userCreate">
        <div class="md-3 row">

        <div class="col-sm-5">
            <label class="" for="priNomSolicitante">Primer Nombre</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="priNomSolicitante" name="priNomSolicitante" class="form-control" autofocus="" require="">
        </div>
        
        <div class="col-sm-5">
            <label class="" for="segNomSolicitante">Segundo Nombre</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="segNomSolicitante" name="segNomSolicitante" class="form-control" autofocus="" require="">
        </div>
        </div>
        <br>
        <div class="md-3 row">

        <div class="col-sm-5">
            <label class="" for="priApeSolicitante">Primer Apellido</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="priApeSolicitante" name="priApeSolicitante" class="form-control" autofocus="" require="">
        </div>

        <div class="col-sm-5">
            <label class="" for="segApeSolicitante">Segundo Apellido</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="segApeSolicitante" name="segApeSolicitante" class="form-control" autofocus="" require="">
        </div>
        </div>
        <br>
        <div class="col-sm-8">
            <label for="correoAspirante">Correo Electronico</label>
            <span class=""><i class=""></i></span>
            <input type="email" id="correoAspirante" name="correoAspirante" class="form-control" autofocus="" require="">
        </div>
            <br>
        <div class="md-3 row">

        <div class="col-sm-5">
            <label class="" for="fechaNacimiento">Fecha de nacimiento</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="fechaNacimiento" name="fechaNacimiento" class="form-control" autofocus="" require="">
        </div>
            
        <div class="col-sm-5">
            <label class="" for="duiAspirante">DUI</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="duiSolicitante" name="duiSolicitante" class="form-control" autofocus="" require="">
        </div>
        </div>
        <br>
        <div class="md-3 row">

        <div class="col-sm-5">
            <label class="" for="genero">Genero</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="genero" name="genero" class="form-control" autofocus="" require="">
        </div>

        <div class="col-sm-5">
            <label class="" for="nitAspirante">NIT</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="nitAspirante" name="nitAspirante" class="form-control" autofocus="" require="">
        </div>
        </div>
        <br>
        
        <div class="md-3 row">

        <div class="col-sm-5">
            <label class="" for="nivelAcademico">Nivel Academico</label>
            <span class=""><i class=""></i></span>
            <input type="text" id="nivelAcademico" name="nivelAcademico" class="form-control" autofocus="" require="">
        </div>

        <div class="col-sm-5">
            <label class="" for="tituloAspirante">Titulo obtenido</label>
            <span class=""><i class=""></i></span>
            <input type="file" id="tituloAspirante" name="tituloAspirante" class="form-control" autofocus="" require="">
        </div>
        </div>

            <br>

        <div class="md-3 row">
        <div class="col-sm-5">
            <label class="" for="passUsuario">Contraseña</label>
            <span class=""><i class=""></i></span>
            <input type="password" id="passUsuario" name="passUsuario" class="form-control" autofocus="" require="">
        </div>
    
        <div class="col-sm-5">
            <label class="" for="contraseñaConfirmar">Confirmar contraseña</label>
            <span class=""><i class=""></i></span>
            <input type="password" id="contraseñaConfirmar" name="contraseñaConfirmar" class="form-control" autofocus="" require="">
        </div>
        </div>

            <br>
        <button class="btn btn-primary" type="submit">Guardar</button>
         
    </form>
    <br>
    <br>
    </div>
    </table>
    </div>
</body>
</html>