<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipeGrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipe Grupos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipe-grupo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Equipe Grupo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'equipe_nome',
            'grupo_idgrupo',
            'vitoria',
            'derrota',
            'empate',
            //'saldo',
            //'aproveitamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
