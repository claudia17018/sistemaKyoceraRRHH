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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/vacantes.css'); ?>">
 
    <title><?= $this->renderSection('titulo')?></title>
</head>
<body>

<!--========== HEADER ==========-->
  <header class="header">
    <div class="header__container">
      <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" alt="" class="header__img">
        <a href="#" class="header__logo">Bienvenido </a>
        
            <div class="header__toggle">
                <i class="bi bi-list" id="header-toggle"></i>
            </div>
     </div>
  </header>
   <div class="nav" id="navbar">
      <nav class="nav__container">
        <div>
             <a href="#" class="nav__link nav__logo">
              <img src="<?php echo base_url('public/assets/imagen/apple-touch-icon.png'); ?>" class="logo__img">
              <img src="<?php echo base_url('public/assets/imagen/KyoceraAVX-name.png'); ?>" class="nav__logo-name">
             </a>
              <div class="nav__list">
                <div class="nav__items">               
                  <h3 class="nav__subtitle">Mi Perfil</h3>
                    <a href="<?=base_url('RRHH/Admin')?>" class="nav__link active">
                      <i class="bi bi-house-door nav__icon"></i>
                      <span class="nav__name">Inicio</span>
                    </a>                 
                      <a href="#" class="nav__link">
                          <i class='bi bi-person-circle nav__icon'></i>
                            <span class="nav__name">Perfil</span>
                          <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>  
                </div>
                <div class="nav__items">
                  <h3 class="nav__subtitle">Reclutamiento</h3>         
                      <a href="<?=base_url('AdminRH/vacantes')?>" class="nav__link">
                        <i class='bi bi-files nav__icon' ></i>
                          <span class="nav__name">Vacantes</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
               </div>
               <div class="nav__items">
                  <h3 class="nav__subtitle">Seleccion</h3>
                      <a href="#" class="nav__link">
                        <i class='bi bi-people nav__icon' ></i>
                          <span class="nav__name">Candidatos</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                       <a href="<?=base_url('RRHH/entrevistas/1')?>" class="nav__link">
                        <i class='bi bi-calendar nav__icon' ></i>
                          <span class="nav__name">Entrevista</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                      <a href="#" class="nav__link">
                        <i class='bi bi-file-text nav__icon' ></i>
                          <span class="nav__name">Plantillas</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
               </div>
                <div class="nav__items">
                  <h3 class="nav__subtitle">Contratacion</h3>
                   
                      <a href="#" class="nav__link">
                        <i class='bi bi-clipboard2-check nav__icon' ></i>
                          <span class="nav__name">Contratos</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>      
               </div>
               <div class="nav__items">
                  <h3 class="nav__subtitle">Reportes</h3>
                    
                      <a href="#" class="nav__link">
                        <i class='bi bi-person-check nav__icon'></i>
                          <span class="nav__name">Nuevos empleados</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                   
                </div>
               <div class="nav__items">
                  <h3 class="nav__subtitle">Configuracion</h3>                 
                      <a href="#" class="nav__link">
                        <i class='bi bi-person nav__icon' ></i>
                          <span class="nav__name">Usuarios</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                      <a href="#" class="nav__link">
                        <i class='bi bi-lock nav__icon' ></i>
                          <span class="nav__name">Roles y permisos</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>                   
                </div>
            </div>
          </div>
            <a href="<?php echo base_url('Auth/Usuario/logout'); ?>" class="nav__link nav__logout">
             <i class="bi bi-box-arrow-left nav__icon" ></i>
             <span class="nav__name">Cerrar sesion</span>
            </a>
      </nav>
    </div>
        <!--========== CONTENTS ==========-->
    <main> 
        <?= $this->renderSection('contenido')?>      
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
    <?= $this->renderSection('js')?>
</body>
</html>