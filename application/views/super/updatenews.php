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
    <title>SINDOJUS-AC | Editar notícia</title>

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
			<h1 class="h2">Editar notícia</h1>
		</div>
		<form method="post" action="<?= base_url('editanoticia/update');?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<input type="hidden" id="newsid" name="newsid" value="<?= $news['newsid']; ?>">
						<input type="hidden" id="newsfront" name="newsfront" value="<?= $news['newsfront']; ?>">
						<input type="hidden" id="newsthumb" name="newsthumb" value="<?= $news['newsthumb']; ?>">
						<input type="hidden" id="newsdate" name="newsdate" value="<?= $news['newsdate']; ?>">
						<input type="text" class="form-control" id="newstitle" name="newstitle" placeholder="Título da notícia" value="<?= $news['newstitle']; ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="newsslug" name="newsslug" placeholder="Slug da notícia" value="<?= $news['newsslug']; ?>">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="newsfront">Foto principal</label>
								<input type="file" class="form-control-file" id="newsfrontupdate" name="newsfrontupdate">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="newsthumb">Thumbnail</label>
								<input type="file" class="form-control-file" id="newsthumbupdate" name="newsthumbupdate">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<h6 class="mb-3">Tipo</h4>
							<div class="d-block my-2">
								<div class="custom-control custom-radio custom-radio-inline">
									<input id="newstype1" name="newstype" type="radio" class="custom-control-input" value="0" <?= $news['newstype'] == 0?'checked':''; ?>>
									<label class="custom-control-label" for="newstype1">Comum</label>
								</div>
								<div class="custom-control custom-radio custom-radio-inline">
									<input id="newstype2" name="newstype" type="radio" class="custom-control-input" value="1" <?= $news['newstype'] == 1?'checked':''; ?>>
									<label class="custom-control-label" for="newstype2">Importante</label>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6 class="my-0">Categoria</h6>
							<br />
							<select class="form-control" name="newscategory" id="newscategory">
								<?php foreach ($categories as $category){ ?>
                                    <option value="<?= $category->categoryid; ?>" <?= $news['newscategory'] == $category->categoryid?'selected':''; ?>> <?php echo $category->categoryname; ?> </option>
                                <?php } ?>
							</select>
						</div>
						<div class="col-sm-7">
							<h6 class="my-0">Tags</h6>
							<br />
							<?php foreach ($tags as $tag){ ?>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" value="<?= $tag->tagid; ?>" id="<?= $tag->tagslug; ?>" name="tagcheck[]"
										<?php foreach($listnewstag as $element){ 
											if($element->newstagtag == $tag->tagid){
												echo "checked";
											}
										}?>
									>
									<label class="form-check-label" for="<?= $tag->tagslug; ?>"><?= $tag->tagname; ?></label>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control border-input" id="newsresume" name="newsresume" rows="4" placeholder="Resumo da Notícia" style="resize: none" ><?= $news['newsresume']; ?></textarea>
					</div>
					<textarea name="newscontent" id="newscontent" placeholder="Conteúdo da notícia" ><?= $news['newscontent']; ?></textarea>
					<script>
						CKEDITOR.replace('newscontent', {
							filebrowserUploadUrl: 'assets/ckeditor/ck_upload.php',
							filebrowserUploadMethod: 'form'
						});
					</script>
					<?php if($news['newsdraft'] == 1){ ?>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="newsdraft" name="newsdraft" <?= $news['newsdraft'] == 1?'checked':''; ?>>
							<label class="form-check-label" for="newsdraft">Salvar como rascunho</label>
						</div>
					<?php } ?>
					<br />
					<button type="submit" class="btn btn-outline-success">Publicar</button>
					<a class="btn btn-outline-danger" href="<?= base_url('noticias'); ?>">Cancelar</a>
				</div>
			</div>
		</form>
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