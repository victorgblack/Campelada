<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Campeonato */

$this->title = $model->idcampeonato;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Campeonatos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campeonato-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcampeonato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcampeonato], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcampeonato',
            'nome',
            'modalidade',
            'formato',
            'usuario_idusuario',
            'qtdEquipe',
            'qtdGrupo',
            'qtdEquipeGrupo',
        ],
    ]) ?>

</div>
