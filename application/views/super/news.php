<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
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
    <title>ADM ACTNS | Notícias</title>

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
	<script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
  </head>
  <body>
   
<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gerenciar notícias</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					<a class="btn btn-sm btn-outline-primary" href="<?= base_url('novanoticia'); ?>">
						<span data-feather="plus"></span>
						Nova Notícia
					</a>
				</div>
            </div>
        </div>
		<div class="row">
			<div class="col-sm-10">
				<?php if($notice){ ?>
					<form method="post" class="form-inline justify-content-md-end" style="margin-bottom:15px" action="<?= base_url('noticias/pesquisar');?>">
						<input class="form-control form-control-sm mr-sm-1 col-md-6" type="text" placeholder="Pesquisar" aria-label="Pesquisar" name="searchlabel" id="searchlabel">
						<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
					</form>
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th scope="col">Título</th>
								<th scope="col">Data</th>
								<th scope="col">Slug</th>
								<th scope="col">Tipo</th>
								<th scope="col">Status</th>
								<th scope="col">Opções</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($notice as $news){ ?>
								<tr>
									<td><?php echo $news->newstitle ?></td>
									<td><?php echo date('d/m/y', strtotime($news->newsdate)) ?></td>
									<td><?php echo $news->newsslug ?></td>
									<td>
										<?php 
											if($news->newstype == 0){
												echo "Comum";
											}else{
												echo "Importante";
											} 
										?>
									</td>
									<td>
										<?php 
											if($news->newsstatus == 1){
												echo "Ativa";
											}else{
												if($news->newsdraft == 1){
													echo "Rascunho";
												}else{
													if($news->newsscheduled == 1){
														echo "Agendada";
													}else{
														echo "Inativa";
													}
												}
											} 
										?>
									</td>
									<td>
										<?php if($news->newsstatus == 1){?>
											<a href="<?= base_url('noticias/mudarstatus/'.$news->newsid); ?>" title="Desativar"><span data-feather="toggle-right"></span></a>
										<?php } else {?>
											<?php if($news->newsdraft == 1){?>
												<span data-feather="toggle-left" stroke="#999999"></span>
											<?php } else {?>
												<?php if($news->newsscheduled == 1){?>
													<span data-feather="toggle-left" stroke="#999999"></span>
												<?php } else {?>
													<a href="<?= base_url('noticias/mudarstatus/'.$news->newsid); ?>" title="Ativar"><span data-feather="toggle-left" stroke="orange"></span></a>
												<?php } ?>
											<?php } ?>
										<?php } ?>
										<a href="<?= base_url('editanoticia/prepare/'.$news->newsid); ?>" title="Editar"><span data-feather="edit-2"></span></a>
										<a href="<?= base_url('noticias/delete/'.$news->newsid); ?>" title="Apagar" onclick="return confirm('Tem certeza que deseja fazer isto?\nApagar uma notícia vai remover qualquer dado sobre ela do sistema.');"><span data-feather="trash-2" stroke="red"></span></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } else {echo "<h4>Nenhuma notícia registrada.</h4>";} ?>
				<div class="row">
					<div class="col-sm-6">
					</div>
					<div class="col-sm-6">
						<?php if($itens){ ?>
							<nav aria-label="Navegação de página exemplo">
								<ul class="pagination justify-content-end">
									<?php if($page == 0){ ?>
									<li class="page-item disabled">
									<?php } else{ ?>
									<li class="page-item">
									<?php } ?>
										<a class="page-link" href="<?= base_url('noticias/pagina/'.($page-1)); ?>" aria-label="Anterior" title="Anterior">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">Anterior</span>
										</a>
									</li>
									<?php if($mult == true){ ?>
										<?php for($i = 0; $i<intdiv($itens, 10); $i++){ ?>
											<?php if($i == $page){ ?>
												<li class="page-item disabled"><a class="page-link" href="<?= base_url('noticias/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
											<?php } else {?>
												<li class="page-item"><a class="page-link" href="<?= base_url('noticias/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
											<?php } ?>
										<?php } ?>
									<?php } else { ?>
										<?php for($i = 0; $i<=intdiv($itens, 10); $i++){ ?>
											<?php if($i == $page){ ?>
												<li class="page-item disabled"><a class="page-link" href="<?= base_url('noticias/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
											<?php } else {?>
												<li class="page-item"><a class="page-link" href="<?= base_url('noticias/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
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
										<a class="page-link" href="<?= base_url('noticias/pagina/'.($page+1)); ?>" aria-label="Próximo" title="Próximo">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Próximo</span>
										</a>
									</li>
								</ul>
							</nav>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					  <div>
						<h6 class="my-0">Gerenciar</h6>
						<br />
						<a href="<?= base_url('categorias'); ?>">Categorias</a>
						<br />
						<a href="<?= base_url('tags'); ?>">Tags</a>
					  </div>
					</li>
				</ul>
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
	<script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
	<script>
      feather.replace()
    </script>
	
</html>
				
				