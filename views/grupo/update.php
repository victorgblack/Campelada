<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = Yii::t('app', 'Update Grupo: ' . $model->idgrupo, [
    'nameAttribute' => '' . $model->idgrupo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idgrupo, 'url' => ['view', 'id' => $model->idgrupo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
