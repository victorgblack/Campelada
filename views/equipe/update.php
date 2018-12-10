<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */

$this->title = Yii::t('app', 'Update Equipe: ' . $model->idequipe, [
    'nameAttribute' => '' . $model->idequipe,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idequipe, 'url' => ['view', 'id' => $model->idequipe]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listaJogadores'=>$listaJogadores
    ]) ?>

</div>
