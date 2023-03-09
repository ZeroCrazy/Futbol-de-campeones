<?php 
	require 'templates/header.php';
	if (isset($_POST['nuevo'])) {
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
		mysql_query("INSERT INTO instalaciones (title,logo,disponibilidades,slider_1,slider_2,slider_3,slider_4,location,telefono,correo,web,provincia,user_id) VALUES ('$title','$logo','$disponibilidades','$slider_1','$slider_2','$slider_3','$slider_4','$location','$telefono','$correo','$web','$provincia','$user[id]')");
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
      <table class="centered responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>Instalación</th>
              <th>Provincia</th>
              <th>Teléfono</th>
              <th>Usuario</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $s_sql = mysql_query("SELECT * FROM instalaciones"); while($s = mysql_fetch_assoc($s_sql)){ ?>
		<?php
		if (isset($_POST['delete'.$s[id].''])) {
			mysql_query("DELETE FROM instalaciones WHERE id='$s[id]'");
			echo $refresh;
		}
		?>
          <tr>
            <td><img style="width: 60px;" src="<?php echo $s['logo']; ?>"></td>
            <td><?php echo $s['title']; ?></td>
            <td><?php echo $s['provincia']; ?></td>
            <td><a href="tel:<?php echo $s['telefono']; ?>"><?php echo $s['telefono']; ?></a></td>
            <td><?php echo getUser($s['user_id']); ?></td>
            <td>
				<a class="modal-trigger" href="<?php echo $config['site']; ?>/admin/instalaciones/editar/<?php echo $s['id']; ?>" style="margin-right: 20px;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Editar">create</i></a>
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
          <input id="logo" name="logo" type="text" class="validate" required>
          <label for="logo">Enlace del logo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <textarea id="disponibilidades" name="disponibilidades" style="height: 80px;" class="materialize-textarea"></textarea>
          <label for="disponibilidades">Disponibilidades (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_1" name="slider_1" type="text" class="validate" required>
          <label for="slider_1">Foto cartel</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_2" name="slider_2" type="text" class="validate">
          <label for="slider_2">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_3" name="slider_3" type="text" class="validate">
          <label for="slider_3">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="slider_4" name="slider_4" type="text" class="validate">
          <label for="slider_4">Foto (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="location" name="location" type="text" class="validate" required>
          <label for="location">Localización</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="telefono" name="telefono" type="text" class="validate" required>
          <label for="telefono">Número de teléfono</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="correo" name="correo" type="text" class="validate" required>
          <label for="correo">Correo electrónico</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="web" name="web" type="text" class="validate">
          <label for="web">Página web (opcional)</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <select name="provincia" required>
		    <option value="" disabled selected>Escoge una opción</option>
			<?php $p_sql = mysql_query("SELECT * FROM provincias"); while($p = mysql_fetch_assoc($p_sql)){ ?>
		    <option value="<?php echo $p['provincia']; ?>"><?php echo $p['provincia']; ?></option>
			<?php } ?>
		  </select>
		  <label>Provincia</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevo">Crear instalación
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