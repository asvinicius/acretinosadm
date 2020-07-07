<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	error_reporting(0);
	ini_set("display_errors", 0 );
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v3.8.6">
		<title>ADM ACTNS | Login</title>

		<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

		<!-- Bootstrap core CSS -->
		<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/bootstrap-grid.css'); ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/bootstrap-grid.min.css'); ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/bootstrap-reboot.css'); ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/bootstrap-reboot.min.css'); ?>" rel="stylesheet" />
		<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
		<meta name="theme-color" content="#563d7c">


		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
		<!-- Custom styles for this template -->
		<link href="<?= base_url('assets/css/floating-labels.css'); ?>" rel="stylesheet">
	</head>
	<body>
		<form class="form-signin" method="post" action="<?= base_url('login/signin');?>" >
			<div class="text-center mb-4">
				<img class="mb-4" src="<?= base_url('assets/img/logotipo.png'); ?>" alt="" width="94" height="82">
				<h1 class="h3 mb-3 font-weight-normal">LIGA ACRETINOS</h1>
				<p>Faça login para acessar a Área de Gerenciamento da Liga Acretinos</p>
			</div>
			<?php if ($loginfail != null) { ?>
				<div class="alert alert-<?php echo $loginfail["class"]; ?>">
					<?php echo $loginfail["message"]; ?>
				</div>
			<?php } ?>
			<div class="form-label-group">
				<input type="text" id="supernick" name="supernick" class="form-control" placeholder="Usuário" required autofocus>
				<label for="supernick">Usuário</label>
			</div>

			<div class="form-label-group">
				<input type="password" id="superpassword" name="superpassword" class="form-control" placeholder="Senha" required>
				<label for="superpassword">Senha</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2020 ACRETINOS</p>
		</form>
	</body>
	<script src="<?= base_url('assets/js/jquery-3.4.1.slim.min.js'); ?>" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/js/feather.min.js'); ?>"></script>
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>
	<script src="dashboard.js"></script></body>
	<script src="<?= base_url('assets/js/bootstrap.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('	assets/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
</html>
