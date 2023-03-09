<?php
error_reporting(1);
	
	include 'config.php';

	$Var = mysql_query("SELECT * FROM cms_settings");
	$settings = mysql_fetch_assoc($Var);
	
	$config = array(
		"logo"		=>		$site . "/images/logo.png",	//Logo
		"site"		=>		$settings['site'], //URL
		"sitename"	=>		$settings['sitename'], //Nombre
		"colorsv"	=>		$settings['colorsv'], //Color del servidor (2º #444444)
		"rankadmin"	=>		"3", //Rango administrador
		"rankarb"	=>		"2", //Rango arbitro
	);
	
	session_start();
	if (isset($_SESSION['id'])) {
		// Datos al haber iniciado sesión
		$user_sql = mysql_query("SELECT * FROM users WHERE id='$_SESSION[id]'");
		$user = mysql_fetch_assoc($user_sql);
	} else {
		// Si no ha iniciado sesión, tendrá nombre de usuario por defecto "-"
		$user = "-";
	}
	
	// Obtención de dirección IP
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	// Obtención de dispositivo
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	function getPlatform($user_agent) {
	   $plataformas = array(
		  'Windows 10' => 'Windows NT 10.0+',
		  'Windows 8.1' => 'Windows NT 6.3+',
		  'Windows 8' => 'Windows NT 6.2+',
		  'Windows 7' => 'Windows NT 6.1+',
		  'Windows Vista' => 'Windows NT 6.0+',
		  'Windows XP' => 'Windows NT 5.1+',
		  'Windows 2003' => 'Windows NT 5.2+',
		  'Windows' => 'Windows otros',
		  'iPhone' => 'iPhone',
		  'iPad' => 'iPad',
		  'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
		  'Mac otros' => 'Macintosh',
		  'Android' => 'Android',
		  'BlackBerry' => 'BlackBerry',
		  'Linux' => 'Linux',
	   );
	   foreach($plataformas as $plataforma=>$pattern){
		  if (eregi($pattern, $user_agent))
			 return $plataforma;
	   }
	   return 'Otras';
	}
	$SO = getPlatform($user_agent);
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset', 'utf-8');
	date_default_timezone_set('Europe/Madrid');
	
	function Filter($str) {
		$str = mysql_real_escape_string($str);
		$str = htmlspecialchars($str);
		$str = filter_var($str, FILTER_SANITIZE_STRING);
		return $str;
	}

	function getMonthPerDay($a){
		$R1 = mysql_query("SELECT * FROM tiempo_meses WHERE id = '{$a}'");
		$R1 = mysql_fetch_assoc($R1);
		return $R1['nombre'];
	}
	
	function getUser($a){
		$R1 = mysql_query("SELECT * FROM users WHERE id = '{$a}'");
		$R1 = mysql_fetch_assoc($R1);
		return $R1['nombre'] . " " . $R1['apellidos'];
	}
	
	function Slug($string){
		return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'))), ' '));
	}
	
	$refresh = "<script>location.reload();</script>";
	
	$dia=date("l");
	if ($dia=="Monday") $dia="Lunes";
	if ($dia=="Tuesday") $dia="Martes";
	if ($dia=="Wednesday") $dia="Miércoles";
	if ($dia=="Thursday") $dia="Jueves";
	if ($dia=="Friday") $dia="Viernes";
	if ($dia=="Saturday") $dia="Sábado";
	if ($dia=="Sunday") $dia="Domingo";
	$mes=date("F");
	if ($mes=="January") $mes="Enero";
	if ($mes=="February") $mes="Febrero";
	if ($mes=="March") $mes="Marzo";
	if ($mes=="April") $mes="Abril";
	if ($mes=="May") $mes="Mayo";
	if ($mes=="June") $mes="Junio";
	if ($mes=="July") $mes="Julio";
	if ($mes=="August") $mes="Agosto";
	if ($mes=="September") $mes="Septiembre";
	if ($mes=="October") $mes="Octubre";
	if ($mes=="November") $mes="Noviembre";
	if ($mes=="December") $mes="Diciembre";
	$ano=date("Y");
	$dia2=date("j");

	
	
?>