<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'Id_Jogador') ?>

    <?= $form->field($model, 'pontuacao_jogador') ?>

    <?= $form->field($model, 'equipe_nome') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
