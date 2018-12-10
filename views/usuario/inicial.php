<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Equipe;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */ 
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
//$this->registerJsFile('@web/usuario/js/testemodal.js');
$this->registerJsFile('https://cdn.jsdelivr.net/npm/vue');
$this->registerJsFile('@web/usuario/js/equipe_create_form.js');
//$this->registerJsFile('@web/usuario/js/botaodomodal.js');

$this->registerCss('#exampleModal { z-index: 1500; }');
?>
<div class="usuario-inicial">         
	<!--<h4>Seus campeonatos</h4>
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            //'idcampeonato',
            'nome',
            'modalidade',
            'formato',
            [
                'attribute'=> 'qtdEquipe',
                'header'=> 'Quant. Equipes',
            ],
            //'qtdGrupo',
            //'qtdEquipeGrupo',

        ],
    ]); ?>  
    -->
</div>  
<div>
    <img src="/campelada/web/usuario/img/bem-vindo.png" width="100%" height="100%">
</div>

<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="#" rel="modal:close">Close</a>
</div>

<!-- Link to open the modal -->
<p><a href="#ex1" rel="modal:open">Open Modal</a></p>