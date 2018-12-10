<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipe */

$this->title = $model->idequipe;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idequipe], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idequipe], [
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
            'idequipe',
            'nome',
            'vitoria_equipe',
            'derrota_equipe',
            'empate_equipe',
            'saldo_equipe',
            'aproveitamento_equipe',
        ],
    ]) ?>

</div>
