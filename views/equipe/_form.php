<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('https://cdn.jsdelivr.net/npm/vue');
$this->registerJsFile('@web/usuario/js/equipe_create_form.js',['depends'=>'\yii\web\JqueryAsset']);
$this->registerJsFile('@web/usuario/js/ativaVue.js',['depends'=>'\yii\web\JqueryAsset']);

if (isset($listaJogadores)) {
    $jogadoresJson = json_encode($listaJogadores);
} else {
    $jogadoresJson = json_encode([]);
}

$script =<<<"EOF"

appEquipes.jogadores = $jogadoresJson;

EOF;

$this->registerJs($script);

?>

<div class="equipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    <div id="appEquipes">

        <div class="form-group">
            <h4>Jogadores:</h4>
            <a class="btn btn-success" v-on:click="pushJogador">Adicionar</a>
            <a class="btn btn-danger" onclick="spliceJogador();" style="float: right;">Excluir</a>
        </div>
        <div class="form-group">
            <div v-for="jogador in jogadores" class="form-group">
                <label>Nome do jogador:</label>
                <input type="hidden" name="idJogador[]" v-model="jogador.id" />
                <input type="text" class="form-control" name="nomeJogador[]" v-model="jogador.nome">
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
