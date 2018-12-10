<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Equipe;
use app\controllers\CampeonatoController;
use \yii\helpers\ArrayHelper;
use app\controllers\EquipeController;


/* @var $this yii\web\View */
/* @var $model app\models\Campeonato */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('https://cdn.jsdelivr.net/npm/vue');
$this->registerJsFile('@web/usuario/js/campeonato_create_form.js',['depends'=>'\yii\web\JqueryAsset']);
$this->registerJsFile('@web/usuario/js/ativaVue.js',['depends'=>'\yii\web\JqueryAsset']);
$this->registerJsFile('@web/usuario/js/campeonato_form.js', ['depends'=>'\yii\web\JqueryAsset']);
$displayFormatos = array_merge(['' => 'Selecione um formato'], $formatos);

if (isset($listaEquipes)) {
    $equipesJson = json_encode($listaEquipes);
} else {
    $equipesJson = json_encode([]);
}

$script =<<<"EOF"

vueApp.equipes = $equipesJson;

EOF;

$this->registerJs($script);


?>
<div class="campeonato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modalidade')->dropDownList(['prompt'=>'Seleciona uma modalidade','futsal'=>'Futsal','basquete'=>'Basquete','voleibol'=>'Voleibol','handebol'=>'Handebol','queimada'=>'Queimada','futebol'=>'Futebol','voleibolDeAreia'=>'Voleibol de areia','jogoEletronico'=>'Jogo eletrônico','outros'=>'Outros']) 	?>

	<?= $form->field($model, 'formato')->dropDownList($displayFormatos, ['id'=>'formato']) ?>

    <?= $form->field($model, 'usuario_idusuario')->hiddenInput(['value'=> Yii::$app->user->identity->idusuario])->label(false) ?>

    <?= $form->field($model, 'qtdEquipe')->textInput(['onchange'=>'pushVarios()','id'=>'qtdEquipe']) ?>
    
    <div id="qtdGrupo">
    <?= $form->field($model, 'qtdGrupo')->textInput() ?>
    </div>

    <?= $form->field($model, 'qtdEquipeGrupo')->textInput(['maxlength' => true]) ?>
    
    <label>Equipes:</label>

    <!-- Link to open the modal -->
    <p>
        <a href="#ex1" rel="modal:open" class="btn btn-success" style="float: right;">Criar Equipe    <span class="ti-plus"></span></a>
       <!-- <button class="btn btn-danger" onclick="spliceEquipe()" style="float: right;margin-bottom: 5px;">Remover campo</button> -->
    </p>
    <div id="app">
        <div v-for="(equipe,index) in equipes" class="form-group">
            <?= Html::dropDownList('equipe',null,ArrayHelper::map($equipes2,'idequipe','nome'), ['class' =>'form-control','v-model'=>'equipe.id','v-on:change'=>"changeTime(index)", 'name' => 'idEquipe[]'])  ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

     <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal" style="background-color: #F4F3EF;">
    
        <!-- Aqui eu coloquei o create de equipe-->
        <iframe src="<?=Url::toRoute(['equipe/create','partial'=>1])?>"></iframe>


        <a href="#" rel="modal:close">Close</a>
    </div>

</div>
