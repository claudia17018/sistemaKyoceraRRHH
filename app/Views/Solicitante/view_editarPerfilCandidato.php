<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="KYOCERA AVX EL SALVADOR"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/assets/imagen/apple-touch-icon.png'); ?>" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/assets/imagen/favicon-32x32.png'); ?>" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/assets/imagen/favicon-16x16.png'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/fonts/fonts-min.css'); ?>" >
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/avxElSalvador.min.css'); ?>" >
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap-icons/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/index.css'); ?>">
    <title><?= $this->renderSection('titulo')?></title>
</head>
<body>

<!--========== HEADER ==========-->
  <header class="header">
    <div class="header__container">
      <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" alt="" class="header__img">
        <a href="#" class="header__logo">Bienvenido </a>
          <div class="header__search">
            <input type="search" placeholder="Buscar" class="header__input">
              <i class="bi bi-search"></i>
            </div>
            <div class="header__toggle">
                <i class="bi bi-list" id="header-toggle"></i>
            </div>
     </div>
  </header>
<div class="nav" id="navbar">
       <nav class="nav__container" >
        <div>
             <a href="#" class="nav__link nav__logo">
              <img src="<?php echo base_url('public/assets/imagen/apple-touch-icon.png'); ?>" class="logo__img">
              <img src="<?php echo base_url('public/assets/imagen/KyoceraAVX-name.png'); ?>" class="nav__logo-name">
             </a>
              <div class="nav__list">
                <div class="nav__items">               
                  <h3 class="nav__subtitle">Mi Perfil</h3>
                    <a href="#" class="nav__link">
                      <i class="bi bi-house-door nav__icon"></i>
                      <span class="nav__name">Inicio</span>
                    </a>                 
                        <a href="#" class="nav__link active">
                          <i class='bi bi-person-circle nav__icon'></i>
                            <span class="nav__name">Perfil</span>
                          <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>
                </div>
                <div class="nav__items">
                  <h3 class="nav__subtitle">Mi postulacion</h3>
                      <a href="#" class="nav__link">
                        <i class='bi bi-people nav__icon' ></i>
                          <span class="nav__name">Mis documentos</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                       <a href="#" class="nav__link">
                        <i class='bi bi-calendar nav__icon' ></i>
                          <span class="nav__name">Solicitud de empleo</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
               </div>
                <div class="nav__items">
                  <h3 class="nav__subtitle">Seleccion</h3>
                   
                      <a href="#" class="nav__link">
                        <i class='bi bi-clipboard2-check nav__icon' ></i>
                          <span class="nav__name">Pruebas</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>      
               </div>
               <div class="nav__items">
                  <h3 class="nav__subtitle">Configuracion</h3>                 
                      <a href="#" class="nav__link">
                        <i class='bi bi-person nav__icon' ></i>
                          <span class="nav__name">Cuenta</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>                  
                </div>
            </div>
            <a href="<?php echo base_url('Auth/Usuario/logout'); ?>" class="nav__link nav__logout">
             <i class="bi bi-box-arrow-left nav__icon" ></i>
             <span class="nav__name">Cerrar sesion</span>
            </a>
          </div>
       </nav>
    </div>
        <!--========== CONTENTS ==========-->
    <main> 
        <?= $this->renderSection('contenido')?>      
       
        <h2 class= "pt-3" style="padding-left: 3%;  color: darkblue;">Mi Perfil</h2>
        <div class="container border pt-4 mt-4" style="background-color: white; padding-left: 3%;">
        <div class="container-fluid" >
            <h2>Editar Perfil</h2><br>
        </div>
    
        <div class="container-fluid" style="color: darkblue; ">
        <form method="POST" action="<?=site_url('User/guardar/'.$solicitante['IDSOLICITANTE']);?>" class="" id="userEdit" name="userEdit">
        
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label class="" for="priNomSolicitante">Primer Nombre</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="priNomSolicitante" name="priNomSolicitante" class="form-control" autofocus="" require="">
                </div>
        
                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="segNomSolicitante">Segundo Nombre</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="segNomSolicitante" name="segNomSolicitante" class="form-control" autofocus="" require="">
                </div>
            </div>
            <br>
            
            <div class="md-2 row">
                <div class="col-sm-5">
                    <label class="" for="priApeSolicitante">Primer Apellido</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="priApeSolicitante" name="priApeSolicitante" class="form-control" autofocus="" require="">
                </div>

                <div class="col-sm-6" style="padding-left: 5%;">
                    <label class="" for="segApeSolicitante">Segundo Apellido</label>
                    <span class=""><i class=""></i></span>
                    <input type="text" id="segApeSolicitante" name="segApeSolicitante" class="form-control" autofocus="" require="">
                </div>
            </div>
            <br>
        
            <div class="col-sm-11">
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
            
                <div class="col-sm-6" style="padding-left: 5%;">
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

                <div class="col-sm-6" style="padding-left: 5%;">
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
            </div>
            <br>
 
            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>
        <br>
        <br>
        </div>
        </div>
    </main>
    
  <footer class="footer">
    <div class="container">
    <div class="col-md-4 d-flex align-items-center">
      <span class="text-muted">&copy; 2022 Kyocera AVX</span>
    </div>
    </div>
  </footer>
    <script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <!--========== MAIN JS ==========-->
    <script src="<?php echo base_url('public/assets/js/main.js'); ?>"></script>

</body>
</html>