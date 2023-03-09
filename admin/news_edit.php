<?php 
	require 'templates/header.php';
	$id = Filter($_GET['id']);
	if (isset($_POST['guardar'])) {
		$title = $_POST['title'];
		$image = $_POST['image'];
		$descripcion = $_POST['descripcion'];
		$link = $_POST['link'];
		$textillo = $_POST['textillo'];
		mysql_query("UPDATE cms_slider SET title='$title', image='$image', descripcion='$descripcion', link='$link', textillo='$textillo' WHERE id='$id'");
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
	<?php $s_sql = mysql_query("SELECT * FROM cms_slider WHERE id='$id'"); while($s = mysql_fetch_assoc($s_sql)){ ?>
  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
		<?php echo $mensaje; ?>
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="title" name="title" value="<?php echo $s['title']; ?>" type="text" class="validate" required>
          <label for="title">Título</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="image" name="image" value="<?php echo $s['image']; ?>" type="text" class="validate" required>
          <label for="image">Enlace de la imagen</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <textarea id="descripcion" name="descripcion" style="height: 80px;" class="materialize-textarea"><?php echo $s['descripcion']; ?></textarea>
          <label for="descripcion">Descripción (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="link" name="link" value="<?php echo $s['link']; ?>" type="text" class="validate">
          <label for="link">Enlace externo (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="textillo">
		    <?php if($s['textillo'] == ''){ ?><option value="" disabled selected>Escoge una opción</option><?php } else { ?><option value="<?php echo $s['textillo']; ?>" selected><?php if($s['textillo'] == 'left-align'){ echo 'Texto izquierda'; } elseif($s['textillo'] == 'center-align'){ echo 'Texto centrado'; } else { echo 'Texto derecha'; } ?></option>
		    <?php } ?>
		    <option value="left-align">Texto izquierda</option>
		    <option value="center-align">Texto centrado</option>
		    <option value="right-align">Texto derecha</option>
		  </select>
		  <label>Alineación del texto</label>
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