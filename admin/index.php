<?php 
	require 'templates/header.php';

	$vowels = array("http://","https://","www.","http://www.","https://www.","/");
	
// 100-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$apikey = "47b790fd0fc41878c80c57c9846132cb";
$ciudad = "Barcelona";
$codigoPais ="ES";
$unidades = "&units=metric";
$idioma = "&lang=es";
$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $ciudad ."," .$codigoPais . $unidades . $idioma . "&APPID=" . $apikey;

// Se solicita el archivo JSON de la url que se pasa como parámetro y se recibe como un string
$datos = file_get_contents($url);

# Datos contenidos en el JSON
$estacion = $json->name;
$pais =$json->sys->country;
$lat = $json->coord->lat;
$lon = $json->coord->lon;
$temp = $json->main->temp;
$tempmax = $json->main->temp_max;
$tempmin = $json->main->temp_min;
$presion = $json->main->pressure;
$humedad = $json->main->humidity;
$velocidadViento = $json->wind->speed;
$estadoCielo = $json->weather[0]->main;
$descripcion = $json->weather[0]->description;
$icono = $json->weather[0]->icon;
$URLicono = "http://openweathermap.org/img/w/" . $icono . ".png";
$nubosidad = $json->clouds->all;
$amanece = $json->sys->sunrise;
$oscurece = $json->sys->sunset;
$fechaHoraMedida = $json->dt;
//http://di002.edv.uniovi.es/~cueva/php/100-JSON-OpenWeatherMap.php
	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='01' AND ano='". date(Y) ."'");$count_visitas01 = mysql_fetch_assoc($Var); 
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='02' AND ano='". date(Y) ."'");$count_visitas02 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='03' AND ano='". date(Y) ."'");$count_visitas03 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='04' AND ano='". date(Y) ."'");$count_visitas04 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='05' AND ano='". date(Y) ."'");$count_visitas05 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='06' AND ano='". date(Y) ."'");$count_visitas06 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='07' AND ano='". date(Y) ."'");$count_visitas07 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='08' AND ano='". date(Y) ."'");$count_visitas08 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='09' AND ano='". date(Y) ."'");$count_visitas09 = mysql_fetch_assoc($Var); 	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='10' AND ano='". date(Y) ."'");$count_visitas10 = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='11' AND ano='". date(Y) ."'");$count_visitas11 = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM visitas WHERE mes='12' AND ano='". date(Y) ."'");$count_visitas12 = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM cms_slider");$count_noticias = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM equipos");$count_equipos = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM instalaciones");$count_instalaciones = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM ligas");$count_ligas = mysql_fetch_assoc($Var);
	$Var = mysql_query("SELECT count(*) count FROM cms_sponsors");$count_sponsor = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM ligas");$count_ligas = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM provincias");$count_provincias = mysql_fetch_assoc($Var);	
	$Var = mysql_query("SELECT count(*) count FROM equipos_miembros");$count_equipos_miembros = mysql_fetch_assoc($Var);	
?>
<div class="container">
  <div class="row">
	<a href="<?php echo $config['site']; ?>/admin/noticias/ver">
	<div class="col s12 m3">
      <div class="card #1e88e5 blue darken-1">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_noticias['count']; ?></b></span>
		  <i class="fas fa-newspaper iconoright"></i>
		  <span class="card-title">Noticias</span>
        </div>
      </div>
	</div>
	</a>
	<a href="<?php echo $config['site']; ?>/admin/instalaciones/ver">
	<div class="col s12 m3">
      <div class="card #ffb300 amber darken-1">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_instalaciones['count']; ?></b></span>
		  <i class="fas fa-futbol iconoright"></i>
		  <span class="card-title">Instalaciones</span>
        </div>
      </div>
	</div>
	</a>
	<a href="<?php echo $config['site']; ?>/admin/equipos/ver">
	<div class="col s12 m3">
      <div class="card #c2185b pink darken-2">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_equipos['count']; ?></b></span>
		  <i class="fas fa-shield-alt iconoright"></i>
		  <span class="card-title">Equipos</span>
        </div>
      </div>
	</div>
	</a>
	<a href="">
	<div class="col s12 m3">
      <div class="card #388e3c green darken-2">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_sponsor['count']; ?></b></span>
		  <i class="fab fa-creative-commons-pd iconoright"></i>
		  <span class="card-title">Sponsors</span>
        </div>
      </div>
	</div>
	</a>
	<a href="<?php echo $config['site']; ?>/admin/ligas/ver">
	<div class="col s12 m3">
      <div class="card #6d4c41 brown darken-1">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_ligas['count']; ?></b></span>
		  <i class="fas fa-users iconoright"></i>
		  <span class="card-title">Ligas</span>
        </div>
      </div>
	</div>
	</a>
	<a href="">
	<div class="col s12 m3">
      <div class="card #c62828 red darken-3">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_provincias['count']; ?></b></span>
		  <i class="fas fa-globe-americas iconoright"></i>
		  <span class="card-title">Provincias</span>
        </div>
      </div>
	</div>
	</a>
	<a href="<?php echo $config['site']; ?>/admin/miembros/ver">
	<div class="col s12 m3">
      <div class="card #8e24aa purple darken-1">
        <div class="card-content white-text">
          <span class="card-title right"><b class="textoright"><?php echo $count_equipos_miembros['count']; ?></b></span>
		  <i class="fas fa-shield-alt iconoright"></i>
		  <span class="card-title">Miembros</span>
        </div>
      </div>
	</div>
	</a>
	<div class="col s12 m3">
      <div class="card <?php if($temp > $tempmax){ echo '#b71c1c red darken-4'; } else { echo '#00c853 green accent-4'; } ?>">
        <div class="card-content white-text">
          <span class="card-title right"><b><?php echo $temp; ?> º</b></span>
		  <img style="position: absolute;margin-left: 75px;margin-top: -5px;" src="<?php echo $URLicono; ?>">
		  <i class="fas fa-thermometer-empty iconoright"></i>
		  <span class="card-title">Grados</span>
		  <div style="position: absolute;margin-top: -10px;"><?php echo $descripcion; ?></div>
        </div>
      </div>
	</div>
	<div class="col s12 m12">
	  <div id="estadisticasVisitasFDC"></div>
	</div>
  </div>
</div>

<script type="text/javascript">
Highcharts.chart('estadisticasVisitasFDC', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Visitas de <?php echo $config['sitename']; ?>' //Contratos OK & VOID
    },
    subtitle: {
        text: 'Fuentes: <a href="<?php echo $config['site']; ?>"><?php echo str_replace($vowels, "", $config['site']); ?></a>'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
	//{
    //    allowDecimals: false,
    //    labels: {
    //        formatter: function () {
    //            return this.value; // clean, unformatted number for year
    //        }
    //    }
    //},
    yAxis: {
        title: {
            text: 'Visitas'
        },
        labels: {
            formatter: function () {
                return this.value; //return this.value + ' visitas';
            }
        }
    },
    tooltip: {
		 formatter: function() {
			return 'Hay <b>' + this.y + '</b> ' + this.series.name + ' en <b>' + this.x + '</b> de <?php echo date(Y); ?>';
		}
    },
	
    plotOptions: {
        column: {
            borderRadius: 12
        }
    },
    series: [{
        name: 'visitas',
        data: [
		<?php echo $count_visitas01['count']; ?>,
		<?php echo $count_visitas02['count']; ?>,
		<?php echo $count_visitas03['count']; ?>,
		<?php echo $count_visitas04['count']; ?>,
		<?php echo $count_visitas05['count']; ?>,
		<?php echo $count_visitas06['count']; ?>,
		<?php echo $count_visitas07['count']; ?>,
		<?php echo $count_visitas08['count']; ?>,
		<?php echo $count_visitas09['count']; ?>,
		<?php echo $count_visitas10['count']; ?>,
		<?php echo $count_visitas11['count']; ?>,
		<?php echo $count_visitas12['count']; ?>
        ]
    }]
});
</script>
