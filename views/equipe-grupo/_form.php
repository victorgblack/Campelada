<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeGrupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipe-grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipe_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grupo_idgrupo')->textInput() ?>

    <?= $form->field($model, 'vitoria')->textInput() ?>

    <?= $form->field($model, 'derrota')->textInput() ?>

    <?= $form->field($model, 'empate')->textInput() ?>

    <?= $form->field($model, 'saldo')->textInput() ?>

    <?= $form->field($model, 'aproveitamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
