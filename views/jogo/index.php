<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jogos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jogo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjogo',
            'grupo_idgrupo',
            'pontuacao_a',
            'pontuacao_b',
            'equipe_a',
            //'equipe_b',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
