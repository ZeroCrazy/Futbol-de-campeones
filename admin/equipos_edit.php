<?php 
	require 'templates/header.php';
	$id = Filter($_GET['id']);
	if (isset($_POST['guardar'])) {
		$nombre = $_POST['nombre'];
		$logo = $_POST['logo'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$web = $_POST['web'];
		$bgcolor = $_POST['bgcolor'];
		mysql_query("UPDATE equipos SET nombre='$nombre', logo='$logo', email='$email', telefono='$telefono', web='$web', bgcolor='$bgcolor' WHERE id='$id'");
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
	<?php $s_sql = mysql_query("SELECT * FROM equipos WHERE id='$id'"); while($s = mysql_fetch_assoc($s_sql)){ ?>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="nombre" name="nombre" value="<?php echo $s['nombre']; ?>" type="text" class="validate" required>
          <label for="nombre">Nombre</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="logo" name="logo" value="<?php echo $s['logo']; ?>" type="text" class="validate">
          <label for="logo">Enlace del logo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="email" name="email" value="<?php echo $s['email']; ?>" type="text" class="validate">
          <label for="email">Correo electrónico</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="telefono" name="telefono" value="<?php echo $s['telefono']; ?>" type="text" class="validate">
          <label for="telefono">Número de teléfono</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="web" name="web" value="<?php echo $s['web']; ?>" type="text" class="validate">
          <label for="web">Página web del equipo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <input id="bgcolor" name="bgcolor" value="<?php echo $s['bgcolor']; ?>" type="color" class="validate" style="width: 100%;padding: 0px;border: none;background: transparent;height: 40px;">
          <label for="bgcolor" style="margin-top: -3px;margin-left: 7px;">Color del equipo</label>
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