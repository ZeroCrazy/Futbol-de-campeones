<?php
mysql_query("INSERT INTO visitas (ruta,ip,dia,mes,ano,date) VALUES ('$config[site]$_SERVER[REQUEST_URI]','$ip','". date(d) ."','". date(m) ."','". date(Y) ."','". date('d/m/Y H:i:s') ."')");
?>
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col s12 m4" style="text-align: center;">
        <h5 class="white-text">Redes sociales</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/FDCFutbol/"><i class="fab fa-facebook-square"></i> Facebook</a></li>
          <li><a class="grey-text text-lighten-3" href="https://twitter.com/FDCFutbol"><i class="fab fa-twitter-square"></i> Twitter</a></li>
          <li><a class="grey-text text-lighten-3" href="https://www.youtube.com/channel/UCyyrARtwH3B5b6yeYoJ8HFA"><i class="fab fa-instagram"></i> Instagram</a></li>
          <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/fdcfutbol/"><i class="fab fa-youtube"></i> YouTube</a></li>
        </ul>
      </div>
	  <div class="col s12 m4" style="text-align: center;">
        <h5 class="white-text">Contáctanos</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="tel:+34617682186"><i class="fas fa-phone-square"></i> +34 617 68 21 86</a></li>
          <li><a class="grey-text text-lighten-3" href="tel:+34692508186"><i class="fas fa-phone-square"></i> +34 692 50 81 86</a></li>
        </ul>
      </div>
	  <div class="col s12 m4" style="text-align: center;">
        <h5 class="white-text">Menú</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="">Inicio</a></li>
          <li><a class="grey-text text-lighten-3" href="">Quienes somos</a></li>
          <li><a class="grey-text text-lighten-3" href="">Instalaciones</a></li>
          <li><a class="grey-text text-lighten-3" href="">Ligas fdc</a></li>
          <li><a class="grey-text text-lighten-3" href="">Fichajes</a></li>
          <li><a class="grey-text text-lighten-3" href="">Contacto</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2017-<?php echo date("Y"); ?> <?php echo $config['sitename']; ?>
    <a class="grey-text text-lighten-4 right" href="http://danigarzon.com/">Powered by danigarzon.com</a>
    </div>
  </div>
</footer>
      <script type="text/javascript" src="<?php echo $config['site']; ?>/src/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo $config['site']; ?>/src/js/materialize.min.js"></script>
	  <script>
	   $(document).ready(function(){
		$('.sidenav').sidenav();
		$('.slider').slider({
			height: 600,
			indicators: false,
			duration: 400
		});
		$('.carousel').carousel({
			duration: 10,
			numVisible: 200,
			dist: 10
		});
		$('.materialboxed').materialbox();
		$('.tabs').tabs();
		$('.tooltipped').tooltip({delay: 30});
	  });
  </script>
    </body>
  </html>