<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jogador */

$this->title = Yii::t('app', 'Update Jogador: ' . $model->Id_Jogador, [
    'nameAttribute' => '' . $model->Id_Jogador,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jogadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_Jogador, 'url' => ['view', 'id' => $model->Id_Jogador]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jogador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
