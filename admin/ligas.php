<?php 
	require 'templates/header.php';
	if (isset($_POST['nuevo'])) {
		$nombre = $_POST['nombre'];
		$instalacion_id = $_POST['instalacion_id'];
		$tipo = $_POST['tipo'];
		mysql_query("INSERT INTO ligas (nombre,instalacion_id,tipo,user_id) VALUES ('$nombre','$instalacion_id','$tipo','$user[id]')");
	}
	
	if (isset($_POST['nuevoequipo'])) {
		$liga_id = $_POST['liga_id'];
		$equipo_id = $_POST['equipo_id'];
		$tipo_juego = $_POST['tipo_juego'];
		mysql_query("INSERT INTO ligas_tiempo (liga_id,equipo_id,tipo,user_id) VALUES ('$liga_id','$equipo_id','$tipo_juego','$user[id]')");
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
      <table class="centered responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>Liga</th>
              <th>Equipos</th>
              <th>Instalación</th>
              <th>Tipo</th>
              <th>Usuario</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $s_sql = mysql_query("SELECT * FROM ligas"); while($s = mysql_fetch_assoc($s_sql)){ 
		$Varxx = mysql_query("SELECT * FROM instalaciones WHERE id='$s[instalacion_id]'");$x = mysql_fetch_assoc($Varxx); 
		$Var = mysql_query("SELECT count(*) count FROM ligas_tiempo WHERE liga_id='$s[id]' AND equipo_id IS NOT NULL");$count_equipos = mysql_fetch_assoc($Var); ?>
		<?php
		if (isset($_POST['delete'.$s[id].''])) {
			mysql_query("DELETE FROM ligas WHERE id='$s[id]'");
			echo $refresh;
		}
		?>
          <tr>
            <td><b><?php echo $s['id']; ?></b></td>
            <td><a target="_blank" href="<?php echo $config['site']; ?>/liga/<?php echo $s['id']; ?>"><?php echo $s['nombre']; ?></a></td>
            <td><?php echo $count_equipos['count']; ?></td>
            <td><a target="_blank" href="<?php echo $config['site']; ?>/admin/instalaciones/editar/<?php echo $x['id']; ?>"><?php echo $x['title']; ?></a></td>
            <td><?php if($s['tipo'] == 'fs'){ echo 'Fútbol Sala'; } else { echo 'Fútbol 7'; } ?></td>
            <td><?php echo getUser($s['user_id']); ?></td>
            <td>
				<a class="modal-trigger" href="<?php echo $config['site']; ?>/admin/ligas/editar/<?php echo $s['id']; ?>" style="margin-right: 20px;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">create</i></a>
				<form method="POST" style="position: absolute;margin-top: -30px;margin-left: 94px;">
				  <button style="border: none;background: transparent;cursor: pointer;" type="submit" href="#" name="delete<?php echo $s['id']; ?>" class="borrar"><i class="material-icons tooltipped" data-position="right" data-delay="50" data-tooltip="Borrar">delete</i></button>
				</form>
			</td>
          </tr>
		<?php } ?>
        </tbody>
      </table>
	</div>
  </div>
</div>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large" href="#" style="background: <?php echo $config['colorsv']; ?>;">
    <i class="large material-icons">add</i>
  </a>
  <ul>
    <li><a class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Nueva liga" href="#add" style="background: <?php echo $config['colorsv']; ?>;"><i class="material-icons">add</i></a></li>
    <li><a class="btn-floating modal-trigger tooltipped" data-position="left" data-delay="50" data-tooltip="Añadir equipo a liga" href="#addequipo" style="background: <?php echo $config['colorsv']; ?>;"><i class="material-icons">account_circle</i></a></li>
  </ul>
</div>

<div id="addequipo" class="modal modal-fixed-footer">
 <div class="modal-content">
   <div class="row">
   <form method="POST">
 	<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
 	<p>Esta sección sirve para poder añadir equipos participantes a una liga.</p>
 	</div>
 	<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
 	  <select class="browser-default" name="liga_id">
 		<option value="" disabled selected>Escoge una liga</option>
 		<?php $d_sql = mysql_query("SELECT * FROM ligas"); while($d = mysql_fetch_assoc($d_sql)){ ?>
 		<option value="<?php echo $d['id']; ?>"><?php echo $d['id']; ?>#<?php echo $d['nombre']; ?> (<?php if($d['tipo'] == 'fs'){ echo 'Fútbol Sala'; } else { echo 'Fútbol 7'; } ?>)</option>
 		<?php } ?>
 	  </select>
 	</div>
	<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
 	  <select class="browser-default" name="equipo_id">
 		<option value="" disabled selected>Escoge un equipo</option>
 		<?php $d_sql = mysql_query("SELECT * FROM equipos"); while($d = mysql_fetch_assoc($d_sql)){ ?>
 		<option value="<?php echo $d['id']; ?>"><?php echo $d['nombre']; ?></option>
 		<?php } ?>
 	  </select>
 	</div>
	<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
 	  <select class="browser-default" name="tipo_juego">
 		<option value="" disabled selected>Escoge un tipo de juego</option>
 		<option value="fs">Fútbol sala</option>
 		<option value="f7">Fútbol 7</option>
 	  </select>
 	</div>
 	<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
 	  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevoequipo">Añadir equipo a liga
 		<i class="material-icons right">send</i>
 	  </button>
 	</div>
   </form>
   </div>
 </div>
 <div class="modal-footer">
   <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
 </div>
</div>

<div id="add" class="modal">
  <div class="modal-content">
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Liga</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="instalacion_id">
		    <option value="" disabled selected>Escoge una instalación</option>
			<?php $i_sql = mysql_query("SELECT * FROM instalaciones"); while($i = mysql_fetch_assoc($i_sql)){ ?>
		    <option value="<?php echo $i['id']; ?>"><?php echo $i['title']; ?></option>
			<?php } ?>
		  </select>
		  <label>¿En qué instalación se jugará esta liga?</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="tipo">
		    <option value="" disabled selected>Escoge una jugabilidad</option>
		    <option value="fs">Fútbol sala</option>
		    <option value="f7">Fútbol 7</option>
		  </select>
		  <label>Jugabilidad</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevo">Crear liga
			<i class="material-icons right">send</i>
		  </button>
        </div>
      </div>
    </form>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
  </div>
</div>