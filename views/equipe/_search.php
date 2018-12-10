<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idequipe') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'vitoria_equipe') ?>

    <?= $form->field($model, 'derrota_equipe') ?>

    <?= $form->field($model, 'empate_equipe') ?>

    <?php // echo $form->field($model, 'saldo_equipe') ?>

    <?php // echo $form->field($model, 'aproveitamento_equipe') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
