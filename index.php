<?php
	$page	=	"Home";
	require 'src/header.php';
?>
<div class="slider">
  <ul class="slides">
	<?php $s_sql = mysql_query("SELECT * FROM cms_slider ORDER BY id DESC"); while($s = mysql_fetch_assoc($s_sql)){ ?>	
    <li>
      <img src="<?php echo $s['image']; ?>"> <!-- random image -->
      <div class="caption <?php echo $s['textillo']; ?>">
        <h3><?php echo $s['title']; ?></h3>
        <h5 class="light grey-text text-lighten-3"><?php echo $s['descripcion']; ?></h5>
        <?php if($s['link'] == ''){} else {?><br><h5 class="light grey-text text-lighten-3"><a href="<?php echo $s['link']; ?>" class="waves-effect waves-light btn" style="background: <?php echo $config['colorsv']; ?>;box-shadow: none;">Leer más</a></h5><?php } ?>
      </div>
    </li>
	<?php } ?>
  </ul>
</div>
<div class="container">
<div class="section"><span>Objetivo</span></div>
<div class="col s12 m12">
<p class="flow-text" style="font-weight: 100;">Llega <?php echo $config['sitename']; ?> para quedarse, con un toque fresco e innovador que marcará un antes y un después en las ligas privadas de fútbol 7 y fútbol Sala. FDC gestiona las mejores ligas privadas de fútbol de Cataluña. Puntuaciones de jugadores, puntuaciones de equipos, trofeos, torneos, reportajes audiovisuales, hacen de <?php echo $config['sitename']; ?> una de las mejores organizaciones de ligas privadas de fútbol de Cataluña. No esperes más, observa tu mismo nuestra página web y redes sociales, y verás como hacemos sentir como auténticos profesionales a nuestros jugadores.
<br>
<br>
Si coordinas ligas de fútbol privadas, o eres gerente de instalaciones que organicen ligas privadas de fútbol, no dudes, añade nuestros servicios a tu organización y verás como tus ligas e instalaciones empiezan a generar campeonatos con más equipos inscritos, y sobretodo apreciarás la satisfacción y fidelización de tus clientes. El tiempo vuela y la tecnología avanza! No te lo pienses más! Contacta con nosotros y haz de tus ligas de fútbol, auténticas ligas de CAMPEONES!!</p>
</div>
<div class="section"><span>Nuestras marcas</span></div>
  <div class="carousel">
  <?php $s_sql = mysql_query("SELECT * FROM cms_sponsors ORDER BY id"); while($s = mysql_fetch_assoc($s_sql)){ ?>	
    <a class="carousel-item" href="<?php if($s['link'] == ''){ echo '#'; } else { ?><?php echo $s['link']; ?><?php } ?>"><img style="width: 150px;" src="<?php echo $config['site']; ?>/src/img/sponsors/<?php echo $s['image']; ?>"></a>
  <?php } ?>
  </div>
</div>
<?php
	require 'src/footer.php';
?>