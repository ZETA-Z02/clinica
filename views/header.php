<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Katari | Welcome</title>
  <!-- Estilos foundation -->
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-float.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/foundation/css/foundation-prototype.css">
  <!-- If you are using the gem version, you need this only -->
  <!-- Motion UI -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
  <!-- Motion UI end -->
  <!-- Pre-conexion fonts y fuentes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;400&display=swap" rel="stylesheet">
  <!-- Pre-conexion fonts y fuentes -->
  <!-- iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- iconos -->
  <!-- CHARTJS-GRAFICOS -->
  <script src="<?php echo constant('URL') . 'node_modules/chart.js/dist/chart.umd.js' ?>"></script>
  <!-- jquery -->
  <script src="<?php echo constant('URL'); ?>public/foundation/js/jquery.js"></script>
  <!-- plugins  -->
  <script src="<?php echo constant('URL'); ?>public/js/plugins/validador/validation.js"></script>
  <script src="<?php echo constant('URL'); ?>public/js/plugins/paginador/js/jpaginate.js"></script>
  <!-- style general -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/style.css">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/js/plugins/paginador/css/jpaginate.css">
</head>

<body>
<div class="off-canvas-wrapper">
    <div class="off-canvas position-left reveal-for-large sidebar-z" id="offCanvas" data-off-canvas>
      <div class="grid-container nav-z">
        <div class="grid-x align-center margin-top-1">
          <img class="shadow" src="<?php echo constant('URL') . 'public/images/katariwhite.png' ?>" alt="katari" width="60%">
        </div>
        <hr>
        <div class="grid-x">
          <div class="cell">
            <ul class="vertical menu">
              <li>
                <a href="<?php echo constant('URL') ?>dashboard">
                  <i class="fas fa-house"></i>
                  <span class="nav-item">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="<?php echo constant('URL') ?>pagos">
                  <i class="fas fa-chart-line"></i>
                  <span class="nav-item">Pagos</span>
                </a>
              </li>
              <li>
                <a href="<?php echo constant('URL') ?>clientes">
                  <i class="fas fa-list"></i>
                  <span class="nav-item">Clientes</span>
                </a>
              </li>
              <li>
                <a href="<?php echo constant('URL') ?>personal">
                  <i class="fas fa-people-line"></i>
                  <span class="nav-item">Personal</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-users-cog"></i>
                  <span class="nav-item">Citas</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-book"></i>
                  <span class="nav-item">Tratamientos</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fas fa-calculator"></i>
                  <span class="nav-item">Agenda</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="cell margin-top-3">
            <ul class="vertical menu">
              <li>
                <a href="#">
                  <i class="fas fa-gears"></i>
                  <span class="nav-item">Configuracion</span>
                </a>
              </li>
              <li>
                <a href="<?php echo constant('URL') ?>login/logout">
                  <i class="fas fa-sign-out-alt"></i>
                  <span class="nav-item">SALIR</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="off-canvas-content" data-off-canvas-content>
      <div class="title-bar hide-for-large">
        <div class="title-bar-left">
          <button type="button" class="menu-icon" data-toggle="offCanvas">
          </button>
          <span class="title-bar-title">Admin Panel</span>
        </div>
      </div>
      <!-- MAIN CONTENT ALL -->
      <div class="grid-container full margin-horizontal-3">