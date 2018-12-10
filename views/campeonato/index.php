<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampeonatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Campeonatos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campeonato-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Campeonato'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            //'idcampeonato',
            'nome',
            'modalidade',
            'formato',
            //'usuario_idusuario',
            //'qtdEquipe',
            //'qtdGrupo',
            //'qtdEquipeGrupo',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>' {outro} {delete}',
                'buttons'=>[
                    'outro'=>function ($url, $model, $key) {
                        return Html::a('<button class="btn btn-success" style="float:right;"><span class="ti-eye">   </span>Gerenciar</button>',Url::toRoute(['campeonato/principal','id'=>$model->idcampeonato]));
                    },
                    'delete'=>function ($url,$model,$key){
                        return Html::a('<button class="btn btn-danger" style="float:right; clear:both; margin-top:5px;"><span class="ti-trash">   </span>Remover</button>', Url::toRoute(['campeonato/delete','id'=>$model->idcampeonato]));
                    }
                ]

            ],
        ],
    ]); ?>
</div>
