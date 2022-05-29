<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Sistemas AVX | Inicio de Sesi&oacute;n</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content="Rolando Cartagena"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/assets/imagen/apple-touch-icon.png'); ?>" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/assets/imagen/favicon-32x32.png'); ?>" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/imagen/favicon-16x16.png'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/fonts/fonts-min.css'); ?>" >
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/avxElSalvador.min.css'); ?>" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap-icons/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/index.css'); ?>">
    </head>
    <body>
        <div class="container indexCss">
         <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
            <div class="row">
                <div class="col align-self-center">
                    <img src="<?php echo base_url('public/assets/imagen/KyoceraAVX.png'); ?>" alt="KyoceraAVX" width="400" height="157"/>
                </div>
                <div class="col">
                    <div class="col-12">
                        <p class="text-center mb-0">Ingrese sus datos para iniciar sesi&oacute;n</p>
                    </div>
                    <hr class="mt-4">
                    <form action="<?php echo base_url('Auth/Usuario/signin'); ?>" method="POST">
                        <label for="username">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill" ></i></span>
                            <input type="text" id="username" name="username" class="form-control" autofocus="" required="" value="<?=old('username')?>">
                        </div>
                        <br>
                        <label for="password">Contrase&ntilde;a</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                            <input type="password" id="password" name="password" class="form-control" required="">
                        </div>
                        <div class="col-lg-12" style="padding-left: 0px !important; padding-right: 0px !important;">
                            <button type="submit" class="btn btn-primary btn-md float-lg-right">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($error)) {
                echo "<br>";
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                echo "$error";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>";
                echo "</div>";
            }
            ?>
        </div>
        <script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    </body>
</html>