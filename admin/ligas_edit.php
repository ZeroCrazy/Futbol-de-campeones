<?php 
	require 'templates/header.php';
	$id = Filter($_GET['id']);
	if (isset($_POST['guardar'])) {
		$nombre = $_POST['nombre'];
		$instalacion_id = $_POST['instalacion_id'];
		$tipo = $_POST['tipo'];
		mysql_query("UPDATE ligas SET nombre='$nombre', instalacion_id='$instalacion_id', tipo='$tipo' WHERE id='$id'");
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
	<?php $s_sql = mysql_query("SELECT * FROM ligas WHERE id='$id'"); while($s = mysql_fetch_assoc($s_sql)){ 
	$Var = mysql_query("SELECT * FROM instalaciones WHERE id='$s[instalacion_id]'");$info = mysql_fetch_assoc($Var); ?>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="nombre" name="nombre" value="<?php echo $s['nombre']; ?>" type="text" class="validate" required>
          <label for="nombre">Liga</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="instalacion_id">
		    <?php if($s['instalacion_id'] == ''){ ?><option value="" disabled selected>Escoge una instalación</option><?php } else { ?><option value="<?php echo $s['instalacion_id']; ?>"><?php echo $info['title']; ?></option><?php } ?>
			<?php $i_sql = mysql_query("SELECT * FROM instalaciones"); while($i = mysql_fetch_assoc($i_sql)){ ?>
		    <option value="<?php echo $i['id']; ?>"><?php echo $i['title']; ?></option>
			<?php } ?>
		  </select>
		  <label>¿En qué instalación se jugará esta liga?</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="tipo">
		    <?php if($s['tipo'] == ''){ ?><option value="" disabled selected>Escoge una jugabilidad</option><?php } else { ?><option value="<?php echo $s['tipo']; ?>"><?php if($s['tipo'] == 'fs'){ echo 'Fútbol sala'; } else { echo 'Fútbol 7'; } ?></option><?php } ?>
		    <option value="fs">Fútbol sala</option>
		    <option value="f7">Fútbol 7</option>
		  </select>
		  <label>Jugabilidad</label>
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