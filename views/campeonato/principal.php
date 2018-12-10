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
<div class="campeonato-principal">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

        'idequipe',
        'nome',
        'vitoria_equipe',
        'derrota_equipe',
        'empate_equipe',
            //'saldo_equipe',
            //'aproveitamento_equipe',
        ],
    ]); ?>
</div>
