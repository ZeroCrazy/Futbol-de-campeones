<?php 
	require 'templates/header.php';
	$id = Filter($_GET['id']);
	if (isset($_POST['guardar'])) {
		$title = $_POST['title'];
		$logo = $_POST['logo'];
		$disponibilidades = $_POST['disponibilidades'];
		$slider_1 = $_POST['slider_1'];
		$slider_2 = $_POST['slider_2'];
		$slider_3 = $_POST['slider_3'];
		$slider_4 = $_POST['slider_4'];
		$location = $_POST['location'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['correo'];
		$web = $_POST['web'];
		$provincia = $_POST['provincia'];
		mysql_query("UPDATE instalaciones SET title='$title', logo='$logo', disponibilidades='$disponibilidades', slider_1='$slider_1', slider_2='$slider_2',
		slider_3='$slider_3', slider_4='$slider_4', location='$location', telefono='$telefono', correo='$correo', web='$web', provincia='$provincia' WHERE id='$id'");
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
	<?php $i_sql = mysql_query("SELECT * FROM instalaciones WHERE id='$id'"); while($i = mysql_fetch_assoc($i_sql)){ ?>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="title" name="title" type="text" value="<?php echo $i['title']; ?>" class="validate" required>
          <label for="title">Título</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="logo" name="logo" type="text" value="<?php echo $i['logo']; ?>" class="validate" required>
          <label for="logo">Enlace del logo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <textarea id="disponibilidades" name="disponibilidades" style="height: 80px;" class="materialize-textarea"><?php echo $i['disponibilidades']; ?></textarea>
          <label for="disponibilidades">Disponibilidades (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_1" name="slider_1" type="text" value="<?php echo $i['slider_1']; ?>" class="validate" required>
          <label for="slider_1">Foto cartel</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_2" name="slider_2" type="text" value="<?php echo $i['slider_2']; ?>" class="validate">
          <label for="slider_2">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_3" name="slider_3" type="text" value="<?php echo $i['slider_3']; ?>" class="validate">
          <label for="slider_3">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_4" name="slider_4" type="text" value="<?php echo $i['slider_4']; ?>" class="validate">
          <label for="slider_4">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="location" name="location" type="text" value="<?php echo $i['location']; ?>" class="validate" required>
          <label for="location">Localización</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="telefono" name="telefono" type="text" value="<?php echo $i['telefono']; ?>" class="validate" required>
          <label for="telefono">Número de teléfono</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="correo" name="correo" type="text" value="<?php echo $i['correo']; ?>" class="validate" required>
          <label for="correo">Correo electrónico</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="web" name="web" type="text" value="<?php echo $i['web']; ?>" class="validate">
          <label for="web">Página web (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="provincia" required>
			<?php if($i['provincia'] == ''){ ?>
			<option value="" disabled selected>Escoge una opción</option>
			<?php } else { ?><option value="<?php echo $i['provincia']; ?>" selected><?php echo $i['provincia']; ?></option>
		    <?php } ?>
			<?php $p_sql = mysql_query("SELECT * FROM provincias"); while($p = mysql_fetch_assoc($p_sql)){ ?>
		    <option value="<?php echo $p['provincia']; ?>"><?php echo $p['provincia']; ?></option>
			<?php } ?>
		  </select>
		  <label>Provincia</label>
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