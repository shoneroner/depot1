<?php
require_once 'homeApp/init.php';
require_once 'homeApp/class/Folder.php';
$projects = Folder::getProjects(DIRECTORY);

?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shoner Dev Box</title>
	<meta name="description" content="ShonerDev HomePage">
	<meta name="author" content="shoner">
	<link href="homeApp/css/bootstrap.min.css" rel="stylesheet">
	<link href="homeApp/css/styles.css?d=<?php echo date('dm'); ?>" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?= USER_NAME ?> Dev Box</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/phpmyadmin/" target="_blank">PhpMyAdmin <span class="sr-only">(current)</span></a></li>
					<li><a href="homeApp/php-info.php" target="_blank">Php infos</a></li>
				</ul>
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Chercher...">
					</div>
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div id="mainContent">
		<div class="container">
			<div class="row">
				<?php foreach ($projects as $project => $values): ?>
					<?php if ($project == 'dirs') : ?>
						<?php foreach ($values as $id => $value): ?>
							<div class="col-md-2 item item<?= $id?>">
								<div class="title">
									<a href="<?= $value['name'] ?>">
										<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?= $value['name'] ?>
									</a>
								</div>
								<div class="path"><?= realpath($value['name']) ?></div>
								<div class="date"><?= $value['date'] ?></div>
								<div class="weight"><?= $value['weight'] ?></div>
							</div>
						<?php endforeach ?>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="homeApp/js/bootstrap.min.js"></script>
	<script src="homeApp/js/scripts.js?d=<?php echo date('dm'); ?>"></script>
	<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>
</body>
</html>