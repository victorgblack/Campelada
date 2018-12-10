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
  <div id="container">
    <?= Alert::widget() ?>
    <?= $content ?> 
  </div>
</body>
<?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>