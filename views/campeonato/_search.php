<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampeonatoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campeonato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcampeonato') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'modalidade') ?>

    <?= $form->field($model, 'formato') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <?php // echo $form->field($model, 'qtdEquipe') ?>

    <?php // echo $form->field($model, 'qtdGrupo') ?>

    <?php // echo $form->field($model, 'qtdEquipeGrupo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
