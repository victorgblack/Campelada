<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TesteAsset;
use yii\helpers\Url;

TesteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>

	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="teste para tcc">
	<meta name="author" content="Victor">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<link rel="icon" type="image/png" href="/campelada/web/usuario/img/campelada-icon-black.png"/>
	<?php $this->head() ?>
</head>

<body id="page-top">
	<?php $this->beginBody() ?>


	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#inicio" style="color: black; font-weight: bold;">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#projeto" style="color: black; font-weight: bold;">O projeto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#quem" style="color: black; font-weight: bold;">Quem somos nós</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="container" id="inicio">
		<?= Alert::widget() ?>
		<?= $content ?> 
	</div>

	<!-- Callout -->
	<section class="callout" id="projeto" style="background-image: url(/campelada/web/teste/img/clash.png); background-position: center left; background-size: 400px; background-color: #1D809F; height: 550px; color: white;">
		<div class="container text-center" style="width: 50%;">
			<h5 class="mx-auto mb-5"> O
				<em>Campelada</em> facilita sua vida proporcionando uma experiência para a organização de competições. Com isso, você pode criar seus campeonatos, suas equipes e adicionar os jogadores.</h5>
			</div>
	</section>

	<!-- Callout -->
	<section class="callout" id="quem" style="background-image: url(/campelada/web/teste/img/james.png); background-position: center right; background-size: 400px; height: 550px;">
		<div class="container text-center">
			<h5 class="mx-auto mb-5" style="width: 50%;"> Somos estudantes do IFRN - Campus Currais Novos e desenvolvemos este projeto como forma de concluir nosso curso e adquirir o título de técnico em Informática conciliando com a confecção de uma ferramenta que auxilia a sociedade.
				<em></em></h5>
			</div>
	</section>

	<!-- Footer -->
	<footer class="footer text-center" style="background-color: #E9ECEF">
		<div class="container">
			<ul class="list-inline mb-5">
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/victorgabriel.advg">
						<i class="icon-social-facebook"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/victorg4br13l">
						<i class="icon-social-twitter"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white" href="#">
						<i class="icon-social-facebook"></i>
					</a>
				</li>
			</ul>
			<p class="text-muted small mb-0">Copyright &copy; Campelada 2018</p>
		</div>
	</footer>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php $this->endBody() ?>  
</body>
</html>
<?php $this->endPage() ?>