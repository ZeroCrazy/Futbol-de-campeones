<?php
	$page	=	"Contacto";
	require 'src/header.php';
?>
<div class="container">
 <div class="row">
  <div class="col s12 m5">
  <div class="section"><span>Contacto</span></div>
   Para solicitar información o contactar con nosotros puedes llamarnos o escribirnos a estos teléfonos o dirección de email.<br>
   <a class="black-text text-lighten-3" href="tel:+34617682186"><i class="fas fa-phone-square"></i> +34 617 68 21 86</a><br>
   <a class="black-text text-lighten-3" href="tel:+34692508186"><i class="fas fa-phone-square"></i> +34 692 50 81 86</a><br><br>
   <a href="mailto:info@futboldecampeones.com">info@futboldecampeones.com</a>
  </div>
  <div class="col s12 m7">
  <div class="section"><span>Formulario de Contacto</span></div>
  <form method="POST">
   <div class="row">
	<div class="input-field col s12 m2"></div>
	<div class="input-field col s12 m8">
      <input id="nombre" name="nombre" type="text" class="validate" required>
      <label for="nombre">Nombre</label>
    </div>
   </div>
   <div class="row">
	<div class="input-field col s12 m2"></div>
	<div class="input-field col s12 m8">
      <input id="email" name="email" type="email" class="validate" required>
      <label for="email">Correo electrónico</label>
    </div>
   </div>
   <div class="row">
	<div class="input-field col s12 m2"></div>
	<div class="input-field col s12 m8">
      <input id="asunto" name="asunto" type="text" class="validate" required>
      <label for="asunto">Asunto</label>
    </div>
   </div>
   <div class="row">
	<div class="input-field col s12 m2"></div>
	<div class="input-field col s12 m8">
      <textarea style="height: 200px;" id="mensaje" name="mensaje" class="materialize-textarea" required></textarea>
      <label for="mensaje">Mensaje</label>
    </div>
   </div>
   <div class="row">
	<div class="input-field col s12 m2"></div>
	<div class="input-field col s12 m8">
      <button type="submit" class="waves-effect waves-light btn" style="width: 100%;background: <?php echo $config['colorsv']; ?>;box-shadow: none;">Enviar</button>
    </div>
   </div>
   </form>
  </div>
 </div>
</div>
<?php
	require 'src/footer.php';
?>