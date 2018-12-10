<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\UsuarioAsset;
use yii\helpers\Url;

UsuarioAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link rel="icon" type="image/png" sizes="96x96" href="/campelada/web/usuario/img/campelada-icon-black.png"/>
  <?php $this->head() ?>

  <script type="text/javascript">
    var route = '<?=Yii::$app->requestedRoute?>';
  </script>
</head>
<body>
  <?php $this->beginBody() ?>
  <div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->

  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="<?=Url::toRoute('usuario/index')?>" class="simple-text" >
        <img src="/campelada/web/usuario/img/campelada-icon-black.png" style="height: 60px;">
        Campelada
      </a>
    </div>

    <ul class="nav">
      <li controller="usuario">
        <a href="<?=Url::toRoute('usuario/inicial')?>">
          <i class="ti-user"></i>
          <p>
            <?php
            if(!Yii::$app->user->isGuest) {
              echo Yii::t('app', '{user}', ['user'=>Yii::$app->user->identity->nome]);
            } else {
              echo Yii::t('app', 'Usuario');
            }
            ?>
          </p>
        </a>
      </li>
      <li controller="campeonato">
        <a href="<?=Url::toRoute('campeonato/index')?>">
          <i class="ti-cup"></i>
          <p>Campeonatos</p>
        </a>
      </li>
      <li controller="equipe">
        <a href="<?=Url::toRoute('equipe/index')?>">
          <i class="ti-flag-alt"></i>
          <p>Equipes</p>
        </a>
      </li>
      <li controller="jogo">
        <a href="<?=Url::toRoute('jogo/index')?>">
          <i class="ti-game"></i>
          <p>Jogos</p>
        </a>
      </li>
      <li>
        <a href="<?=Url::toRoute('site/logout')?>" data-method="post">
          <i class="ti-close"></i>
          <p>Sair</p>
        </a>
      </li>
  <?php /*
  <li>
    <a href="typography.html">
      <i class="ti-text"></i>
      <p>Typography</p>
    </a>
  </li>
  <li>
    <a href="icons.html">
      <i class="ti-pencil-alt2"></i>
      <p>Icons</p>
    </a>
  </li>
  <li>
    <a href="maps.html">
      <i class="ti-map"></i>
      <p>Maps</p>
    </a>
  </li>
  <li>
    <a href="notifications.html">
      <i class="ti-bell"></i>
      <p>Notifications</p>
    </a>
  </li>
  <li class="active-pro">
    <a href="upgrade.html">
      <i class="ti-export"></i>
      <p>Upgrade to PRO</p>
    </a>
  </li>
  */?>
</ul>
</div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar bar1"></span>
          <span class="icon-bar bar2"></span>
          <span class="icon-bar bar3"></span>
        </button>
        <h4>Olá, <?php echo Yii::t('app', '{user}', ['user'=>Yii::$app->user->identity->nome]);?></h4>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!--
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="ti-panel"></i>
              <p>Stats</p>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="ti-bell"></i>
              <p class="notification">5</p>
              <p>Notifications</p>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Notification 1</a></li>
              <li><a href="#">Notification 2</a></li>
              <li><a href="#">Notification 3</a></li>
              <li><a href="#">Notification 4</a></li>
              <li><a href="#">Another notification</a></li>
            </ul>
          </li>
          -->
          <li>
            <a href="<?= Url::toRoute('usuario/settings') ?>">
              <i class="ti-settings"></i>
              <p><?php echo Yii::t('app','Settings')?></p>
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div id="container">
    <?= Alert::widget() ?>
    <?= $content ?> 
  </div>

  <footer class="footer">
    <div class="container-fluid">
      <nav class="pull-left">
        <ul>
        <?php /*  
          <li>
            <a href="http://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
             Blog
           </a>
         </li>
         <li>
          <a href="http://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
        */?>
      </ul>
    </nav>
    <div class="copyright pull-right">
      &copy; <script>document.write(new Date().getFullYear())</script>, Feito com <i class="fa fa-heart heart"></i> por <a href="http://www.creative-tim.com">os boy</a>
    </div>
  </div>
</footer>

</div>
</div>


</body>
<?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>