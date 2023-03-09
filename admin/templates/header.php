<?php 
	require '../inc/core.php';
	require '../inc/openweathermap.php';
	if (isset($_SESSION['id'])) {} else {
		header("Location: ". $config[site] ."/admin/login.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
	<title><?php echo $config['sitename']; ?></title>
	<link rel="icon" href="<?php echo $config['site']; ?>/admin/assets/images/favicon.ico" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo $config['site']; ?>/admin/assets/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $config['site']; ?>/admin/assets/css/all.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $config['site']; ?>/admin/assets/js/materialize.min.js"></script>
	<script src="<?php echo $config['site']; ?>/admin/assets/highcharts/highcharts.js"></script>
	<script src="<?php echo $config['site']; ?>/admin/assets/highcharts/modules/exporting.js"></script>
	<script src="<?php echo $config['site']; ?>/admin/assets/highcharts/modules/export-data.js"></script>
	<script>
  $(document).ready(function(){
    $('.dropdown-trigger').dropdown();
	$('.carousel').carousel();
	$('.sidenav').sidenav();
	$('.tooltipped').tooltip({delay: 50});
	$('.modal').modal();
	$('select').formSelect();
	$('.fixed-action-btn').floatingActionButton();
  });
      
	</script>
	<style>
	nav {
		background-color: <?php echo $config['colorsv'];; ?> !important;
	}
	.dropdown-content {
		margin-top: 64px !important;
		top: 0px !important;
	}
	.card {
		box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.25) !important;
		border-radius: 0px !important;
		border-bottom: 4px solid rgba(0, 0, 0, 0.20) !important;
	}
	.iconoright {
		color: rgba(0, 0, 0, 0.10);
		float: right;
		font-size: 80px;
		margin-right: -26px;
		margin-top: -21px;
	}
	.textoright {
		position: relative;
		background: rgba(0, 0, 0, 0.30);
		padding: 5px 15px;
		border-radius: 50%;
	}
	.borrar {
		color: #d60606;	
	}
	.btn,.btn:hover,.btn:focus {
		background: <?php echo $config['colorsv']; ?>;
	}
	</style>
  </head>
  <body>
<!-- Dropdown Structure -->
<ul id="usuario<?php echo $user['id']; ?>" class="dropdown-content">
  <li class="tooltipped" data-position="right" data-delay="50" data-tooltip="Cerrar sesión"><a href="<?php echo $config['site']; ?>/admin/logout">Cerrar sesión</a></li>
</ul>
<ul id="usuario_mobile_<?php echo $user['id']; ?>" class="dropdown-content">
  <li><a href="<?php echo $config['site']; ?>/admin/logout">Cerrar sesión</a></li>
</ul>
  <nav>
    <div class="nav-wrapper">
    <div class="container">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo $config['site']; ?>/admin/home">Inicio</a></li>
		<li><a class="dropdown-trigger" href="#!" data-target="usuario<?php echo $user['id']; ?>"><img style="width: 25px;margin-top: 20px;position: absolute;margin-left: 50px;" src="<?php echo $user['perfil']; ?>" alt="" class="circle responsive-img"> <?php echo $user['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
      </ul>
    </div>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo $config['site']; ?>/admin/home">Inicio</a></li>
	<li><a href="<?php echo $config['site']; ?>/admin/noticias/ver">Noticias</a></li>
	<li><a href="<?php echo $config['site']; ?>/admin/instalaciones/ver">Instalaciones</a></li>
	<li><a class="dropdown-trigger" href="#!" data-target="usuario_mobile_<?php echo $user['id']; ?>"><img style="width: 25px;margin-top: 12px;position: absolute;margin-left: 50px;" src="<?php echo $user['perfil']; ?>" alt="" class="circle responsive-img"> <?php echo $user['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
  </ul>  
  
  <br>