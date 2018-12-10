<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeGrupoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipe-grupo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equipe_nome') ?>

    <?= $form->field($model, 'grupo_idgrupo') ?>

    <?= $form->field($model, 'vitoria') ?>

    <?= $form->field($model, 'derrota') ?>

    <?= $form->field($model, 'empate') ?>

    <?php // echo $form->field($model, 'saldo') ?>

    <?php // echo $form->field($model, 'aproveitamento') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
