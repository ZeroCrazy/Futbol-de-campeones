<?php
	require 'inc/core.php';
?>
  <!DOCTYPE html>
  <html>
    <head>
	  <title><?php echo $config['sitename']; ?>: <?php echo $page; ?></title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="<?php echo $config['site']; ?>/src/css/materialize.min.css"  media="screen,projection"/>
	  <link rel="stylesheet" href="<?php echo $config['site']; ?>/src/css/fontawesome-all.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <style>
	  nav {
		background-color: #000;
		font-family: "Russo One";
		letter-spacing: 0.6px;
		margin-bottom: 3px;
		box-shadow: none;
	  }
	  nav ul a:hover {
		border-bottom: 3px solid #0558bc;
		color: #ffffffa8;
	  }
	  nav, nav .nav-wrapper i, nav a.sidenav-trigger, nav a.sidenav-trigger i {
		height: 150px;
		line-height: 150px;
		text-transform: uppercase;
	  }
	  .slider .indicators {
		visibility: hidden;
		position: absolute;
	  }
	  .carousel-item {
		  -webkit-filter: grayscale(100%);
		  filter: grayscale(100%);
	  }
	  .carousel-item:hover {
		  -webkit-filter: none;
	  }
	  .section {
		color: #0558bc;
		height: 42px;
		margin-bottom: 20px;
		border-bottom: 1px solid;
		text-align: left;
	  }
	  .section span {
		font-size: 30px;
		background-color: #fff;
		padding: 0 10px;
		font-weight: 100;
		margin-left: 30px;
		color: #323232;
	  }
	  .page-footer {
		  background: url(<?php echo $config['site']; ?>/src/img/overlay.png) #313131;
	  }
	  </style>
    </head>

    <body>
	<div class="container" style="text-align: right;font-size: 24px;">
	<a style="color: #444 !important;" class="grey-text text-lighten-3" href="https://www.facebook.com/FDCFutbol/"><i class="fab fa-facebook-square"></i> </a>
	<a style="color: #444 !important;" class="grey-text text-lighten-3" href="https://twitter.com/FDCFutbol"><i class="fab fa-twitter-square"></i> </a>
	<a style="color: #444 !important;" class="grey-text text-lighten-3" href="https://www.youtube.com/channel/UCyyrARtwH3B5b6yeYoJ8HFA"><i class="fab fa-instagram"></i> </a>
	<a style="color: #444 !important;" class="grey-text text-lighten-3" href="https://www.instagram.com/fdcfutbol/"><i class="fab fa-youtube"></i> </a>
	</div>
  <nav>
    <div class="nav-wrapper">
	<div class="container">
      <a href="<?php echo $config['site']; ?>" class="brand-logo"><img style="width: 130px;margin-top: 10px;" src="<?php echo $config['site']; ?>/src/img/logo.png"></a>
	  <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?php echo $config['site']; ?>/home">Inicio</a></li>
        <li><a href="<?php echo $config['site']; ?>/quienes-somos">Quienes somos</a></li>
        <li><a href="<?php echo $config['site']; ?>/instalaciones/Barcelona">Instalaciones</a></li>
        <li><a href="<?php echo $config['site']; ?>/#">Ligas fdc</a></li>
        <li><a href="<?php echo $config['site']; ?>/#">Fichajes</a></li>
        <li><a href="<?php echo $config['site']; ?>/contacto">Contacto</a></li>
      </ul>
    </div>
    </div>
  </nav>
  
  <ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo $config['site']; ?>/home">Inicio</a></li>
    <li><a href="<?php echo $config['site']; ?>/quienes-somos">Quienes somos</a></li>
	<li><a href="<?php echo $config['site']; ?>/instalaciones/Barcelona">Instalaciones</a></li>
    <li><a href="<?php echo $config['site']; ?>/#">Ligas fdc</a></li>
    <li><a href="<?php echo $config['site']; ?>/#">Fichajes</a></li>
    <li><a href="<?php echo $config['site']; ?>/contacto">Contacto</a></li>
  </ul>