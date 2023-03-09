<?php 
	require 'templates/header.php';
	$id = Filter($_GET['id']);
	if (isset($_POST['guardar'])) {
		$nombre_completo = $_POST['nombre_completo'];
		$foto = $_POST['foto'];
		$posicion = $_POST['posicion'];
		$numero_camiseta = $_POST['numero_camiseta'];
		$equipo_id = $_POST['equipo_id'];
		mysql_query("UPDATE equipos_miembros SET nombre_completo='$nombre_completo', foto='$foto', posicion='$posicion', numero_camiseta='$numero_camiseta', equipo_id='$equipo_id' WHERE id='$id'");
		$mensaje = '
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		<div class="card-panel #00c853 green accent-4 center">
		  <span class="white-text text-darken-2">Cambios guardados</span>
		</div>
		</div>
		';
		echo "<script>window.history.go(-2);</script>";
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
	<?php $s_sql = mysql_query("SELECT * FROM equipos_miembros WHERE id='$id'"); while($s = mysql_fetch_assoc($s_sql)){ 
	$Var = mysql_query("SELECT * FROM equipos WHERE id='$s[equipo_id]'");$info = mysql_fetch_assoc($Var);	?>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="equipo_id" required>
			<?php if($s['equipo_id'] == ''){ ?>
			<option value="" disabled selected>Escoge un equipo</option>
			<?php } else { ?>
			<option value="<?php echo $s['equipo_id']; ?>" selected><?php echo $info['nombre']; ?></option>
		    <?php } ?>
			<?php $p_sql = mysql_query("SELECT * FROM equipos"); while($p = mysql_fetch_assoc($p_sql)){ ?>
		    <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre']; ?></option>
			<?php } ?>
		  </select>
		  <label>Equipo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="nombre_completo" name="nombre_completo" value="<?php echo $s['nombre_completo']; ?>" type="text" class="validate" required>
          <label for="nombre_completo">Nombre</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="foto" name="foto" value="<?php echo $s['foto']; ?>" type="text" class="validate">
          <label for="foto">Enlace de la foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="posicion" required>
			<?php if($s['equipo_id'] == ''){ ?>
			<option value="" disabled selected>Escoge una posición</option>
			<?php } else { ?>
			<option value="<?php echo $s['posicion']; ?>" selected><?php echo $s['posicion']; ?></option>
		    <?php } ?>
		    <option value="Defensa">Defensa</option>
		    <option value="Portero">Portero</option>
			<option value="Delantero">Delantero</option>
		  </select>
		  <label>Posición</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="numero_camiseta" name="numero_camiseta" value="<?php echo $s['numero_camiseta']; ?>" type="text" class="validate">
          <label for="numero_camiseta">Número de la camiseta</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="guardar">Guardar cambios
			<i class="material-icons right">send</i>
		  </button>
        </div>
      </div>
    </form>
  </div>
	<?php } ?>
	</div>
  </div>
</div>