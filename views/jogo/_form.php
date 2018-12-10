<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jogo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grupo_idgrupo')->textInput() ?>

    <?= $form->field($model, 'pontuacao_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pontuacao_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipe_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipe_b')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
