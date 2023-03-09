<?php
	error_reporting(1);
	$page	=	"Instalaciones";
	require 'src/header.php';
?>
<style>
.space-left {
	font-size: 18px;
    line-height: 34px;
    border-left: 4px solid <?php echo $config['colorsv']; ?>;
    padding: 0px 10px;
}

.cubre-azul {
	height: 200px;
    display: table-cell;
    width: 50%;
    position: absolute;
    margin-left: -15px;
    background: <?php echo $config['colorsv']; ?>;
}

.informacion {
    background: <?php echo $config['colorsv']; ?>;
    padding: 40px 15px;
    color: #fff;
    -webkit-transform: skew(20deg);
    -moz-transform: skew(20deg);
    -ms-transform: skew(20deg);
    -o-transform: skew(20deg);
    transform: skew(20deg);
}
.cabecera-single {
    display: table;
    width: 100%;
    position: relative;
    margin-top: 25px;
}

.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
</style>
<?php if($_GET['id']){ ?>
<?php $i_sql = mysql_query("SELECT * FROM instalaciones WHERE id='". Filter($_GET[id]) ."'"); while($i = mysql_fetch_assoc($i_sql)){ ?>	
<div style="background: url(<?php echo $config['site']; ?>/src/img/overlay.png), url(<?php echo $config['site']; ?>/src/img/cesped.jpg) 50% 0%;">
	<div class="container">
		<div class="row white-text" style="padding: 40px 0px;">
			<div class="col s12 m12 center" style="text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.76);">
			  <h1 style="font-family: Russo One;font-weight: bold;font-size: 30px;margin: 3px;"><?php echo $i['title']; ?></h1>
			  <div style="color: #fff !important;line-height: 20px !important;">
			  	<b>Dirección:</b> <a style="font-weight: 100;color: #fff !important;" href="https://www.google.es/maps/search/<?php echo $i['location']; ?>/"><?php echo $i['location']; ?></a> | 
			  	<b>Teléfono:</b>  <a style="font-weight: 100;color: #fff !important;" href="tel:<?php echo $i['telefono']; ?>"><?php echo $i['telefono']; ?></a> | 
			  	<b>Correo:</b>    <a style="font-weight: 100;color: #fff !important;" href="mailto:<?php echo $i['correo']; ?>"><?php echo $i['correo']; ?></a> | 
			  	<b>Web:</b>       <a style="font-weight: 100;color: #fff !important;" href="http://<?php echo $i['web']; ?>"><?php echo $i['web']; ?></a>
			  </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col s12 m4">
      <div class="card" style="box-shadow: none;">
        <div class="card-content black-text" style="font-weight: 100;font-size: 18px;">
          <div class="section"><span>Nuestras instalaciones</span></div>
          <img style="width: 250px;" src="<?php echo $i['logo']; ?>">
		  <br>
		  Nuestras instalaciones disponen de:<br>
		  <p><?php echo $i['disponibilidades']; ?></p>
        </div>
      </div>
    </div>
	<div class="col s12 m5">
      <div class="card" style="box-shadow: none;">
        <div class="card-content black-text" style="font-weight: 100;font-size: 18px;">
          <div class="section"><span>Nuestras ligas</span></div>
		  <div class="row">
			<div class="input-field col s12 m6">
			<b style="font-family: 'Russo One';letter-spacing: 0.6px;margin-bottom: 3px;box-shadow: none;">FÚTBOL SALA</b><br>
			<?php $fs_sql = mysql_query("SELECT * FROM ligas_tiempo WHERE instalacion_id='$i[id]' AND tipo='fs'"); while($fs = mysql_fetch_assoc($fs_sql)){ 
			$Varxx = mysql_query("SELECT * FROM ligas WHERE id='$fs[liga_id]'");$x = mysql_fetch_assoc($Varxx);?>	
			<a href="<?php echo $config['site']; ?>/liga/<?php echo $x['id']; ?>" style="text-transform: uppercase;"><?php echo $x['nombre']; ?></a><br>
			<?php } ?>
			</div>
			<div class="input-field col s12 m6">
			<b style="font-family: 'Russo One';letter-spacing: 0.6px;margin-bottom: 3px;box-shadow: none;">FÚTBOL 7</b><br>
			<?php $fs_sql = mysql_query("SELECT * FROM ligas_tiempo WHERE instalacion_id='$i[id]' AND tipo='f7'"); while($fs = mysql_fetch_assoc($fs_sql)){ 
			$Varxx = mysql_query("SELECT * FROM ligas WHERE id='$fs[liga_id]'");$x = mysql_fetch_assoc($Varxx);?>	
			<a href="<?php echo $config['site']; ?>/liga/<?php echo $x['id']; ?>" style="text-transform: uppercase;"><?php echo $x['nombre']; ?></a><br>
			<?php } ?>
			</div>
		  </div>
        </div>
      </div>
    </div>
	<div class="col s12 m3">
      <div class="card" style="box-shadow: none;">
        <div class="card-content black-text" style="font-weight: 100;font-size: 18px;">
          <div class="section"><span>Puntúanos</span></div>
		  
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php } else { ?>
<div class="container">
  <div class="row">
    <div class="col s12 m12">
      <div class="card" style="background: #eae4e4;box-shadow: none;">
        <div class="card-content black-text" style="text-align: center;padding: 0px;">
          <div class="row" style="margin: 0px;">
			<div class="input-field col s12 m8" style="margin: 25px 0px;">
			Si lo prefieres, puedes filtrar nuestras instalaciones por provincia:
			</div>
			<div class="input-field col s12 m3">
			<select name="provincia" class="browser-default" onchange="if (this.value) window.location.href=this.value">
			<?php if($_GET['provincia']){ ?>
				<option value="<?php echo $_GET['provincia']; ?>" selected disabled><?php echo $_GET['provincia']; ?></option>
			<?php } else { ?>
				<option value="" selected disabled>Selecciona provincia</option>
			<?php } ?>
			<?php $i_sql = mysql_query("SELECT * FROM provincias"); while($i = mysql_fetch_assoc($i_sql)){ ?>	
			  <option value="<?php echo $config['site']; ?>/instalaciones/<?php echo $i['provincia']; ?>"><?php echo $i['provincia']; ?></option>
			<?php } ?>
			</select>
			</div>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 m12">
	
	<?php $i_sql = mysql_query("SELECT * FROM instalaciones WHERE provincia='$_GET[provincia]' ORDER BY id"); while($i = mysql_fetch_assoc($i_sql)){ ?>	
	<div class="row">
	  <div class="input-field col s12 m5">
		<img class="materialboxed" width="450" src="<?php echo $i['slider_1']; ?>">
	  </div>
	  <div class="input-field col s12 m7">
		<h1 style="font-family: Russo One;font-weight: bold;font-size: 30px;"><?php echo $i['title']; ?></h1>
		<div class="space-left">
		  <b>Dirección:</b> <a href="https://www.google.es/maps/search/<?php echo $i['location']; ?>/"><?php echo $i['location']; ?></a><br>
		  <b>Teléfono:</b> <a href="tel:<?php echo $i['telefono']; ?>"><?php echo $i['telefono']; ?></a><br>
		  <b>Correo:</b> <a href="mailto:<?php echo $i['correo']; ?>"><?php echo $i['correo']; ?></a><br>
		  <b>Web:</b> <a href="http://<?php echo $i['web']; ?>"><?php echo $i['web']; ?></a>
		</div>
		<br>
		<a href="<?php echo $config['site']; ?>/instalacion/<?php echo $i['id']; ?>" class="waves-effect waves-light btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;">Ver instalaciones</a>
	  </div>
	</div>
	<?php } ?>
  </div>
</div>
<?php } ?>
<?php
	require 'src/footer.php';
?>