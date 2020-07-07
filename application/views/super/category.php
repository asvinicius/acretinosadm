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
    <title>SINDOJUS-AC | Categorias</title>

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
        <h1 class="h2">Gerenciar categorias</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a class="btn btn-sm btn-outline-primary" href="<?= base_url('novacategoria'); ?>">
					<span data-feather="plus"></span>
					Nova categoria
				</a>
			</div>
			<div class="btn-group mr-2">
				<a class="btn btn-sm btn-outline-danger" href="<?= base_url('noticias'); ?>">
					<span data-feather="arrow-left"></span>
					Voltar
				</a>
			</div>
		</div>
      </div>
	  <?php if($categories){ ?>
			<table class="table table-sm table-hover">
				<thead>
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">Slug</th>
						<th scope="col">Status</th>
						<th scope="col">Opções</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($categories as $category){ ?>
						<tr>
							<td><?php echo $category->categoryname ?></th>
							<td><?php echo $category->categoryslug ?></td>
							<td>
								<?php 
									if($category->categorystatus == 1){
										echo "Ativa";
									}else{
										echo "Inativa";
									} 
								?>
							</td>
							<td>
								<?php 
									if($category->categorystatus == 1){?>
										<a href="<?= base_url('categorias/mudarstatus/'.$category->categoryid); ?>" title="Desativar"><span data-feather="toggle-right"></span></a>
									<?php } else { ?>
										<a href="<?= base_url('categorias/mudarstatus/'.$category->categoryid); ?>" title="Ativar"><span data-feather="toggle-left" stroke="orange"></span></a>
									<?php } ?>
								<a href="<?= base_url('editacategoria/prepare/'.$category->categoryid); ?>" title="Editar"><span data-feather="edit-2"></span></a>
								<a href="<?= base_url('categorias/delete/'.$category->categoryid); ?>" title="Apagar" onclick="return confirm('Tem certeza que deseja fazer isto?\nRemover uma categoria pode causar problemas na filtragem das notícias.');"><span data-feather="trash-2" stroke="red"></span></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else {
			echo "<h4>Nenhuma categoria registrada.</h4>";
			} ?>
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
