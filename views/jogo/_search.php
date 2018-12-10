<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idjogo') ?>

    <?= $form->field($model, 'grupo_idgrupo') ?>

    <?= $form->field($model, 'pontuacao_a') ?>

    <?= $form->field($model, 'pontuacao_b') ?>

    <?= $form->field($model, 'equipe_a') ?>

    <?php // echo $form->field($model, 'equipe_b') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
