<?php
  require '../inc/core.php';
  $page = 'Iniciar sesión';
  $Varu = mysql_query("SELECT * FROM users WHERE ip='$ip'");$u = mysql_fetch_assoc($Varu);
  if (isset($_SESSION['id'])) {
	  header("Location: ". $config[site] ."/admin/home");
  } else {
	  if (isset($_POST['LoginUser'])) {
		  $email = Filter($_POST['email']);
		  $password = Filter($_POST['password']);
		  $error = "0";
		  $user_verify = mysql_query("SELECT * FROM users WHERE email='$email' && password='$password' LIMIT 1");
		  $user_fetch = mysql_fetch_assoc($user_verify);
		  
		  if (mysql_num_rows($user_verify) == 0) {
			$error = "1";
			$mensaje = '
			<div class="alert alert-danger m-b-16" role="alert" style="width: 100%;text-align: center;">
				Usuario o contraseña incorrecto
			</div>
			';
		  } else {
			$_SESSION['id'] = $user_fetch['id'];
			mysql_query("UPDATE users SET ip='$ip', so='$SO', last_online='". date(d) ."-". date(m) ."-". date(Y) ."' WHERE id='$user_fetch[id]'");
			header("Location: ". $config[site] ."/admin/home");
		  }
	  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $config['sitename']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						<?php echo $config['sitename']; ?>
					</span>

					
					<?php echo $mensaje; ?>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Campo obligatorio">
						<input autocomplete="off" class="input100" type="text" name="email" placeholder="Correo electrónico">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Campo obligatorio">
						<input autocomplete="off" class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recuérdame
							</label>
						</div>

						<!--div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div-->
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" name="LoginUser" class="login100-form-btn">
							Acceder
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>

	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/login/vendor/select2/select2.min.js"></script>

	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>

	<script src="assets/login/js/main.js"></script>

</body>
</html>
  <?php } ?>