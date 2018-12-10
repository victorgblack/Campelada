<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jogo */

$this->title = Yii::t('app', 'Update Jogo: ' . $model->idjogo, [
    'nameAttribute' => '' . $model->idjogo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jogos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjogo, 'url' => ['view', 'id' => $model->idjogo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jogo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
