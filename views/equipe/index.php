<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipe');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/usuario/js/testemodal.js');
?>
<div class="equipe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Equipe'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'idequipe',
        'nome',
        'vitoria_equipe',
        'derrota_equipe',
        'empate_equipe',
            //'saldo_equipe',
            //'aproveitamento_equipe',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
</div>
