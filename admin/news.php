<?php 
	require 'templates/header.php';
	if (isset($_POST['nuevo'])) {
		$title = $_POST['title'];
		$image = $_POST['image'];
		$descripcion = $_POST['descripcion'];
		$link = $_POST['link'];
		$textillo = $_POST['textillo'];
		mysql_query("INSERT INTO cms_slider (title,image,descripcion,link,textillo,date,user_id) VALUES ('$title','$image','$descripcion','$link','$textillo','". date('d/m/Y H:i:s') ."','$user[id]')");
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
      <table class="centered responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>Titulo</th>
              <th>Usuario</th>
			  <th>Fecha</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $s_sql = mysql_query("SELECT * FROM cms_slider"); while($s = mysql_fetch_assoc($s_sql)){ ?>
		<?php
		if (isset($_POST['delete'.$s[id].''])) {
			mysql_query("DELETE FROM cms_slider WHERE id='$s[id]'");
			echo $refresh;
		}
		?>
          <tr>
            <td><b><?php echo $s['id']; ?></b></td>
            <td><?php echo $s['title']; ?></td>
            <td><?php echo getUser($s['user_id']); ?></td>
			<td><?php echo substr($s['date'], 0, 10); ?></td>
            <td>
				<a class="modal-trigger" href="<?php echo $config['site']; ?>/admin/noticias/editar/<?php echo $s['id']; ?>" style="margin-right: 20px;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Editar">create</i></a>
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
        <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="title" name="title" type="text" class="validate" required>
          <label for="title">Título</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="image" name="image" type="text" class="validate" required>
          <label for="image">Enlace de la imagen</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <textarea id="descripcion" name="descripcion" style="height: 80px;" class="materialize-textarea"></textarea>
          <label for="descripcion">Descripción (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="link" name="link" type="text" class="validate">
          <label for="link">Enlace externo (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="textillo">
		    <option value="" disabled selected>Escoge una opción</option>
		    <option value="left-align">Texto izquierda</option>
		    <option value="center-align">Texto centrado</option>
		    <option value="right-align">Texto derecha</option>
		  </select>
		  <label>Alineación del texto</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevo">Guardar cambios
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