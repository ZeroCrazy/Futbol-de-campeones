<?php
	$page	=	str_replace("/", "", $_SERVER['REQUEST_URI']);
	require 'inc/core.php';
?>
<!DOCTYPE html>
<html>
  <head>
  <title><?php echo $config['sitename']; ?>: <?php echo $page; ?></title>
    <link type="text/css" rel="stylesheet" href="<?php echo $config['site']; ?>/src/css/error-page.css"  media="screen,projection"/>
  <link rel="stylesheet" href="<?php echo $config['site']; ?>/src/css/fontawesome-all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
  </div>
  <div class='c'>
    <div class='_404'><i class="far fa-frown"></i></div>
    <div class='_1'>No se ha encontrado <b><?php echo str_replace("/", "", $_SERVER['REQUEST_URI']); ?></b>,</div>
    <div class='_2'>el archivo ha sido eliminado o movido temporalmente.</div>
    <a class='btn' href='javascript:history.back(1)'>VOLVER ATRÁS</a>
  </div>
</body>
</html>