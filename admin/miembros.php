<?php 
	require 'templates/header.php';
	if (isset($_POST['nuevo'])) {
		$nombre_completo = $_POST['nombre_completo'];
		$foto = $_POST['foto'];
		$posicion = $_POST['posicion'];
		$numero_camiseta = $_POST['numero_camiseta'];
		$equipo_id = $_POST['equipo_id'];
		mysql_query("INSERT INTO equipos_miembros (nombre_completo,foto,posicion,numero_camiseta,equipo_id,user_id) VALUES ('$nombre_completo','$foto','$posicion','$numero_camiseta','$equipo_id','$user[id]')");
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
      <table class="centered responsive-table">
        <thead>
          <tr>
              <th>Equipo</th>
			  <th>Jugador</th>
              <th>Número</th>
              <th>Posición</th>
              <th>Usuario</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $e_sql = mysql_query("SELECT * FROM equipos_miembros"); while($e = mysql_fetch_assoc($e_sql)){ 
		$Varxx = mysql_query("SELECT * FROM equipos WHERE id='".$e[equipo_id]."'");$x = mysql_fetch_assoc($Varxx);
		if (isset($_POST['delete'.$e[id].''])) {
			mysql_query("DELETE FROM equipos_miembros WHERE id='$e[id]'");
			echo $refresh;
		}
		?>
          <tr>
            <td><img style="width: 40px;" src="<?php echo $x['logo']; ?>" title="<?php echo $x['nombre']; ?>"></td>
			<td><?php echo $e['nombre_completo']; ?></td>
            <td><?php echo $e['numero_camiseta']; ?></td>
            <td><?php echo $e['posicion']; ?></td>
            <td><?php echo getUser($e['user_id']); ?></td>
            <td>
				<a class="modal-trigger" href="<?php echo $config['site']; ?>/admin/miembros/editar/<?php echo $e['id']; ?>" style="margin-right: 20px;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Editar">create</i></a>
				<form method="POST" style="position: absolute;margin-top: -30px;margin-left: 94px;">
				  <button style="border: none;background: transparent;cursor: pointer;" type="submit" href="#" name="delete<?php echo $e['id']; ?>" class="borrar"><i class="material-icons tooltipped" data-position="right" data-delay="50" data-tooltip="Borrar">delete</i></button>
				</form>
			</td>
          </tr>
		<?php } ?>
        </tbody>
      </table>
	</div>
  </div>
</div>

<div class="fixed-action-btn tooltipped" data-position="top" data-delay="50" data-tooltip="Nuevo">
  <a class="btn-floating btn-large modal-trigger" href="#add" style="background: <?php echo $config['colorsv']; ?>;">
    <i class="large material-icons">add</i>
  </a>
</div>

<div id="add" class="modal">
  <div class="modal-content">
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="equipo_id" required>
			<option value="" disabled selected>Escoge un equipo</option>
			<?php $p_sql = mysql_query("SELECT * FROM equipos"); while($p = mysql_fetch_assoc($p_sql)){ ?>
		    <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre']; ?></option>
			<?php } ?>
		  </select>
		  <label>Equipo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="nombre_completo" name="nombre_completo" type="text" class="validate" required>
          <label for="nombre_completo">Nombre</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="foto" name="foto" type="text" class="validate">
          <label for="foto">Enlace de la foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="posicion" required>
			<option value="" disabled selected>Escoge una posición</option>
		    <option value="Delantero">Delantero</option>
		    <option value="Defensa">Defensa</option>
		    <option value="Portero">Portero</option>
		  </select>
		  <label>Posición</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="numero_camiseta" name="numero_camiseta" type="text" class="validate">
          <label for="numero_camiseta">Número de la camiseta</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevo">Crear miembro
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