<?php
	error_reporting(1);
	$page	=	"Ligas";
	require 'src/header.php';
	$ligafdc = Filter($_GET['liga_fdc']);
	$vowels = array("Fútbol sala", "Fútbol 7", "Fútbol Sala", "fútbol sala", "fútbol Sala", "fútbol 7", "Futbol sala", "Futbol 7", "Futbol Sala", "futbol sala", "futbol Sala", "futbol 7");
?>
<style>
.tabs {
	background: transparent;
}
.tabs .indicator {
	background-color: <?php echo $config['colorsv']; ?> !important;
}
.tabs .tab a:hover, .tabs .tab a.active {
	background-color: #ffffff91;
	color: <?php echo $config['colorsv']; ?> !important;
}
.tabs .tab a {
	color: <?php echo $config['colorsv']; ?> !important;
}
.tabs .tab a:focus, .tabs .tab a:focus.active {
    background-color: #fff;
    outline: none;
}
.row .col.s2 {
	margin-right: 1px;
	background: #fff;
}
.row .col.s3 {
	margin-right: 1px;
	background: #fff;
}
</style>
<?php if($_GET['liga_fdc']){ ?>
<?php $i_sql = mysql_query("SELECT * FROM ligas WHERE id='$ligafdc'"); while($l = mysql_fetch_assoc($i_sql)){ 
$iis = mysql_query("SELECT * FROM instalaciones WHERE id='$l[instalacion_id]'");$i = mysql_fetch_assoc($iis);
?>
<div style="background: url(<?php echo $config['site']; ?>/src/img/overlay.png), url(<?php echo $config['site']; ?>/src/img/cesped.jpg) 50% 0%;">
	<div class="container">
		<div class="row white-text" style="padding: 40px 0px;">
			<div class="col s12 m12 center" style="text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.76);">
<h1 style="font-family: Russo One;font-weight: bold;font-size: 30px;margin: 3px;">Liga <?php echo $l['nombre']; ?></h1>
			  <div style="color: #fff !important;line-height: 20px !important;">
			  	<b>Instalación:</b> <a style="font-weight: 100;color: #fff !important;" href="<?php echo $config['site']; ?>/instalacion/<?php echo $i['id']; ?>"><?php echo $i['title']; ?></a><br>
			  	<b>Dirección:</b> <a style="font-weight: 100;color: #fff !important;" href="https://www.google.es/maps/search/<?php echo $i['location']; ?>/"><?php echo $i['location']; ?></a> | 
			  	<b>Teléfono:</b>  <a style="font-weight: 100;color: #fff !important;" href="tel:<?php echo $i['telefono']; ?>"><?php echo $i['telefono']; ?></a> | 
			  	<b>Correo:</b>    <a style="font-weight: 100;color: #fff !important;" href="mailto:<?php echo $i['correo']; ?>"><?php echo $i['correo']; ?></a> | 
			  	<b>Web:</b>       <a style="font-weight: 100;color: #fff !important;" href="http://<?php echo $i['web']; ?>"><?php echo $i['web']; ?></a>
			  </div>
			</div>
		</div>
		<br>
	</div>
</div>
<div class="container" style="margin-top: -48px;">
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s2 tooltipped" data-position="top" data-delay="50" data-tooltip="Equipos"><a href="#equipos"><i class="fas fa-users"></i></a></li>
        <li class="tab col s2 tooltipped" data-position="top" data-delay="50" data-tooltip="Resultados"><a href="#resultados"><i class="fas fa-file"></i></a></li>
        <li class="tab col s3 tooltipped" data-position="top" data-delay="50" data-tooltip="Clasificación"><a href="#clasificacion"><i class="fas fa-sitemap"></i></a></li>
        <li class="tab col s2 tooltipped" data-position="top" data-delay="50" data-tooltip="Calendario"><a href="#calendario"><i class="fas fa-calendar-alt"></i></a></li>
        <li class="tab col s2 tooltipped" data-position="top" data-delay="50" data-tooltip="Top 10 goleadores"><a href="#topgoleadores"><i class="fas fa-chess-king"></i></a></li>
      </ul>
    </div>
	<br><br><br><br>
    <div id="equipos" class="col s12">
	  <div class="row">
	
	
<?php $e_sql = mysql_query("SELECT * FROM ligas_tiempo WHERE liga_id='$l[id]'"); while($e = mysql_fetch_assoc($e_sql)){
$Varxx = mysql_query("SELECT * FROM equipos WHERE id='$e[equipo_id]'");$x = mysql_fetch_assoc($Varxx);?>
<?php if($x['nombre'] == ''){} else { ?>
  <div class="col s12 m4">
    <div class="card" style="<?php if($x['bgcolor'] == ''){ ?>background-color: <?php echo $config['colorsv']; ?> !important;<?php } else { ?>background-color: <?php echo $x['bgcolor']; ?> !important;<?php } ?>">
	<div class="card-content white-text">
	  <div style="background: #fff;border-radius: 50%;width: 160px;height: 160px;margin-left: 95px;margin-bottom: 20px;">
		<img class="center" src="<?php echo $x['logo']; ?>" style="width: 107px;margin-top: 22px;margin-left: 26px;">
	  </div>
	  <span class="card-title center"><?php echo strtoupper($x['nombre']); ?></span><br>
	  <a href="<?php echo $config['site']; ?>/club/<?php echo $x['id']; ?>" class="btn" style="width: 100%;box-shadow: none;background: #0000006b;">Ver equipo</a>
	</div>
  </div>
  </div>
<?php } ?>
<?php } ?>
	
	
	  </div>
	</div>
    <div id="resultados" class="col s12">Test 2</div>
    <div id="clasificacion" class="col s12">Test 3</div>
    <div id="calendario" class="col s12">Test 4</div>
    <div id="topgoleadores" class="col s12">Test 5</div>
  </div>
</div>
<?php } ?>
<?php } ?>
<?php
	require 'src/footer.php';
?>