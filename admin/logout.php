<?php

	require '../inc/core.php';
	session_destroy();
	header("Location: ". $config[site] ."/admin/login.php");

?>