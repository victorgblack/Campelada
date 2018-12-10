<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeGrupo */

$this->title = $model->equipe_nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipe Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipe-grupo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'equipe_nome' => $model->equipe_nome, 'grupo_idgrupo' => $model->grupo_idgrupo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'equipe_nome' => $model->equipe_nome, 'grupo_idgrupo' => $model->grupo_idgrupo], [
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
            'equipe_nome',
            'grupo_idgrupo',
            'vitoria',
            'derrota',
            'empate',
            'saldo',
            'aproveitamento',
        ],
    ]) ?>

</div>
