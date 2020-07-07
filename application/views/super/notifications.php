<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	error_reporting(0);
	ini_set("display_errors", 0 );
?>
<!DOCTYPE html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>SINDOJUS-AC | Notificações</title>

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
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Notificações</h1>
      </div>
	  <?php if($notifies){ ?>
			<table class="table table-sm table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Descrição</th>
						<th scope="col">Status</th>
						<th scope="col">Opções</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($notifies as $notify){ ?>
						<tr class="<?php if($notify->notifystatus == 1){echo "table-primary";} ?>">
							<th scope="row"><?php echo $notify->notifyid ?></th>
							<td><?php echo $notify->notifydescription ?></td>
							<td>
								<?php 
									if($notify->notifystatus == 1){
										echo "Não lida";
									}else{
										echo "Lida";
									} 
								?>
							</td>
							<td>
								<a href="<?= base_url($notify->notifylink); ?>" title="Abrir notificação"><span data-feather="external-link"></span></a>
								<a href="<?= base_url('notificacoes/marcar/'.$notify->notifyid); ?>" title="Marcar como <?php if($notify->notifystatus == 0){echo "não ";} ?>lida"><span data-feather="book<?php if($notify->notifystatus == 0){echo "-open";} ?>"></span></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else {echo "<h4>Nenhuma nova notificação.</h4>";} ?>
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<nav aria-label="Navegação de página exemplo">
					<ul class="pagination justify-content-end">
						<?php if($page == 0){ ?>
						<li class="page-item disabled">
						<?php } else{ ?>
						<li class="page-item">
						<?php } ?>
							<a class="page-link" href="<?= base_url('notificacoes/pagina/'.($page-1)); ?>" aria-label="Anterior" title="Anterior">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Anterior</span>
							</a>
						</li>
						<?php if($mult == true){ ?>
							<?php for($i = 0; $i<intdiv($itens, 10); $i++){ ?>
								<?php if($i == $page){ ?>
									<li class="page-item disabled"><a class="page-link" href="<?= base_url('notificacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
								<?php } else {?>
									<li class="page-item"><a class="page-link" href="<?= base_url('notificacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
								<?php } ?>
							<?php } ?>
						<?php } else { ?>
							<?php for($i = 0; $i<=intdiv($itens, 10); $i++){ ?>
								<?php if($i == $page){ ?>
									<li class="page-item disabled"><a class="page-link" href="<?= base_url('notificacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
								<?php } else {?>
									<li class="page-item"><a class="page-link" href="<?= base_url('notificacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						<?php if(intdiv($itens, 10) == $page){ ?>
						<li class="page-item disabled">
						<?php } else{ ?>
							<?php if($mult == true){ ?>
								<?php if(intdiv($itens, 10) == ($page+1)){ ?>
									<li class="page-item disabled">
								<?php } else{ ?>
									<li class="page-item">
								<?php } ?>
							<?php } ?>
						<?php } ?>
							<a class="page-link" href="<?= base_url('notificacoes/pagina/'.($page+1)); ?>" aria-label="Próximo" title="Próximo">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Próximo</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
    </main>
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
