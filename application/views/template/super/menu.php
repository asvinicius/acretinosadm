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

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
	<link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap-grid.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap-grid.min.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap-reboot.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap-reboot.min.css'); ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/font/css/brands.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/font/css/solid.css'); ?>" rel="stylesheet">
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
    <link href="<?= base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
	
	<script src="https://unpkg.com/feather-icons/dist/feather.js"></script>
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script src="<?= base_url('assets/js/feather.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/feather.js'); ?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>
  </head>
  <body>

	<div class="container-fluid">
	  <div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
				<!--
					<li class="nav-item">
						<a class="nav-link <?php if($page['current']['id'] == 1){echo 'active';} ?>" href="<?= base_url('notificacoes'); ?>">
						  <span data-feather="bell" ></span>
						  Notificações
						  <?php if($page['current']['unread']){ ?>
							<span class="badge badge-danger badge-pill"><?= $page['current']['unread'] ?></span>
						  <?php } ?>
						</a>
					</li>
				-->
					<li class="nav-item">
						<a class="nav-link <?php if($page['current']['id'] == 2){echo 'active';} ?>" href="<?= base_url('noticias'); ?>">
						  <span data-feather="file-text"></span>
						  Gerenciar Notícias
						</a>
					</li>
				
				<!--
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 3){echo 'active';} ?>" href="<?= base_url('os'); ?>">
					  <span data-feather="clipboard"></span>
					  Ordens de Serviço
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 4){echo 'active';} ?>" href="<?= base_url('comunicacao'); ?>">
					  <span data-feather="mail"></span>
					  Comunicação
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 5){echo 'active';} ?>" href="<?= base_url('assembleias'); ?>">
					  <span data-feather="twitch"></span>
					  Gerenciar Assembleias
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 6){echo 'active';} ?>" href="<?= base_url('parceiros'); ?>">
					  <span data-feather="link"></span>
					  Parcerias e Convênios
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 7){echo 'active';} ?>" href="<?= base_url('os'); ?>">
					  <span data-feather="clipboard"></span>
					  Requerimentos
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 8){echo 'active';} ?>" href="<?= base_url('galerias'); ?>">
					  <span data-feather="image"></span>
					  Gerenciar Galerias
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 9){echo 'active';} ?>" href="<?= base_url('modelos'); ?>">
					  <span data-feather="file-text"></span>
					  Gerenciar Modelos
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 10){echo 'active';} ?>" href="<?= base_url('financeiro'); ?>">
					  <span data-feather="dollar-sign"></span>
					  Financeiro
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 11){echo 'active';} ?>" href="<?= base_url('oficiais'); ?>">
					  <span data-feather="users"></span>
					  Gerenciar Oficiais
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 12){echo 'active';} ?>" href="<?= base_url('oficios'); ?>">
					  <span data-feather="file-text"></span>
					  Gerenciar Ofícios
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 13){echo 'active';} ?>" href="<?= base_url('documentos'); ?>">
					  <span data-feather="database"></span>
					  Gerenciar Documentos
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link <?php if($page['current']['id'] == 14){echo 'active';} ?>" href="<?= base_url('listas'); ?>">
					  <span data-feather="list"></span>
					  Listas TJ
					</a>
				  </li>
				 
				-->
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('login/signout'); ?>">
						  <span data-feather="log-out"></span>
						  Sair
						</a>
					</li>
				</ul>
			</div>
		</nav>
  </div>
</div>
	<script src="<?= base_url('assets/js/jquery-3.4.1.slim.min.js'); ?>" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.js"></script>
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script src="<?= base_url('assets/js/feather.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/feather.js'); ?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script></body>
	<script src="<?= base_url('assets/js/bootstrap.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('	assets/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
	<script>
      feather.replace()
    </script>
</html>
