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
      <nav class="nav__container">
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
                      <a href="#" class="nav__link">
                          <i class='bi bi-person-circle nav__icon'></i>
                            <span class="nav__name">Perfil</span>
                          <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>  
                </div>
                <div class="nav__items">
                  <h3 class="nav__subtitle">Reclutamiento</h3>         
                      <a href="#" class="nav__link">
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
                       <a href="#" class="nav__link">
                        <i class='bi bi-calendar nav__icon' ></i>
                          <span class="nav__name">Entrevista</span>
                        <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                      </a>
                      <a href="#" class="nav__link active">
                        <i class='bi bi-check2-square nav__icon' ></i>
                          <span class="nav__name">Seleccionados</span>
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
            <a href="#" class="nav__link nav__logout">
             <i class="bi bi-box-arrow-left nav__icon" ></i>
             <span class="nav__name">Cerrar sesion</span>
            </a>
      </nav>
    </div>
        <!--========== CONTENTS ==========-->
    <main> 
        <?= $this->renderSection('contenido')?> 
    

    <div class="container-md" >
        <br>
        <table class="table-borderless"> 
            <tbody>
                <tr>    
                    <td rowspan="2">
                        <img src="<?php echo base_url('public/assets/imagen/user.png'); ?>" width="150px" height="150px">
                    </td>
                    <td style="width:10%;"></td>
                    <td><h2><label>Nombre</label></h2></td>     
                </tr>
                <tr>
                    <td></td>
                    <td>Seleccionado
                        <i class="bi-check-circle" style="color: red"></i>
                    </td>
                    <td style="width:20%;"></td>
                    <td>Fase actual del proceso</td>
                    <td style="width:5%;"></td>
                    <td><label> hola</label></td>
                </tr>
            </tbody>
        </table>
        <br>    
   
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">     
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: black">RESUMEN&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: black">SOLICITUD EMPLEO&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">ENTREVISTAS&nbsp;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: black">PRUEBAS&nbsp;</a>
                </li>
            </ul>
        </div>
        </div>
        </nav>
        
        <div class="container-fluid" style="background-color: white; padding-left: 30px; padding-right: 30px">
           
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary bi-plus-lg" type="button"> Nueva</button>
            </div>
            <span style="align-items: center;">N° de entrevistas:
                <label><?=count($entrevistas['datosEntrevista']); ?></label>           
            </span>
            <br><br>
               
            <?php foreach($entrevistas['datosEntrevista'] as $entrevista):?>
            <div id="datosEntrevistas" class="container-md border border-secondary" 
                 style="border-radius:5px; padding-left:25px; padding-right:25px; padding-top:15px; ">
                <p><b><?=$entrevista['TITULOENTREVISTA']?></b>
                <span style="font-size:18px; float:right;">
                    <a class="bi-pencil-fill me-md-1"  href="#"></a>
                    <a class="bi-x-circle" style="color: red;" href="#"></a>
                </span>              
                <br>
                <div class="row g-3">
                    <div class="col-auto">
                        <label>Desde: <?=$entrevista['HORAINICIO']?></label>
                    </div>
                    <div class="col-md-4">
                        <label>Hasta: <?=$entrevista['HORAFINALIZACION']?></label>
                    </div>
                    <div class="col-md-4">
                        <label><?=$entrevista['FECHAENTREVISTA']?></label>
                    </div>
                    <div class="col-auto">
                        <label><?=$entrevista['MODALIDADENTREVISTA']?></label>
                    </div>
                    
                    <div class="container-fluid mb-3">
                        <p><?=$entrevista['DESCRIPCIONENTREVISTA']?></p>
                    
                        <label for="exampleFormControlTextarea1" class="form-label">Comentarios&nbsp;</label>
                        <a class="bi-plus-square-fill" style="font-size:18px;" 
                           href="<?=base_url('AdminRH/nuevoComentario/'.$entrevista['IDENTREVISTA']);?>"></a>
                                                                
                        <?php foreach($comentarios['datosComentario'] as $comentario): 
                            if($entrevista['IDENTREVISTA']==$comentario['IDENTREVISTA']):?>
                            <textarea class="form-control border-2" 
                                      rows="3" style="background-color: whitesmoke;" disabled
                                       ><?=$comentario['COMENTARIOS']?>
                                        </textarea><br>
                         <?php endif; endforeach;?>
                    </div>
                </div>              
            </div>
            <br><br> 
            <?php endforeach;?>
        </div> 
        
    </div>        
    </main>
    
    <footer class="footer">
    <div class="container-md" >
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
