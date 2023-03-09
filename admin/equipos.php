<?php 
	require 'templates/header.php';
	if (isset($_POST['nuevo'])) {
		$nombre = $_POST['nombre'];
		$logo = $_POST['logo'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$web = $_POST['web'];
		$bgcolor = $_POST['bgcolor'];
		mysql_query("INSERT INTO equipos (nombre,logo,email,telefono,web,bgcolor,user_id) VALUES ('$nombre','$logo','$email','$telefono','$web','$bgcolor','$user[id]')");
	}
?>
<div class="container">
  <div class="row">
	<div class="col s12 m12">
      <table class="centered responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>Equipo</th>
              <th>Miembros</th>
              <th>Teléfono</th>
              <th>Usuario</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
		<?php $e_sql = mysql_query("SELECT * FROM equipos"); while($e = mysql_fetch_assoc($e_sql)){ 
		if (isset($_POST['delete'.$e[id].''])) {
			mysql_query("DELETE FROM equipos WHERE id='$e[id]'");
			echo $refresh;
		}
		$Var = mysql_query("SELECT count(*) count FROM equipos_miembros WHERE equipo_id='$e[id]'");$count_miembros = mysql_fetch_assoc($Var);
		?>
          <tr>
            <td><img style="width: 40px;" src="<?php echo $e['logo']; ?>"></td>
            <td><?php echo $e['nombre']; ?></td>
            <td><?php echo $count_miembros['count']; ?></td>
            <td><a href="tel:<?php echo $e['telefono']; ?>"><?php echo $e['telefono']; ?></a></td>
            <td><?php echo getUser($e['user_id']); ?></td>
            <td>
				<a class="modal-trigger" href="<?php echo $config['site']; ?>/admin/equipos/editar/<?php echo $e['id']; ?>" style="margin-right: 20px;color: <?php echo $config['colorsv']; ?>;"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Editar">create</i></a>
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
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="logo" name="logo" type="text" class="validate">
          <label for="logo">Enlace del logo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="email" name="email" type="text" class="validate">
          <label for="email">Correo electrónico</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="telefono" name="telefono" type="text" class="validate">
          <label for="telefono">Número de teléfono</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          <input id="web" name="web" type="text" class="validate">
          <label for="web">Página web del equipo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <input id="bgcolor" name="bgcolor" type="color" class="validate" style="width: 100%;padding: 0px;border: none;background: transparent;height: 40px;">
          <label for="bgcolor" style="margin-top: -3px;margin-left: 7px;">Color del equipo</label>
        </div>
		<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
		  <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" name="nuevo">Crear equipo
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