<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jogo */

$this->title = $model->idjogo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jogos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idjogo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idjogo], [
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
            'idjogo',
            'grupo_idgrupo',
            'pontuacao_a',
            'pontuacao_b',
            'equipe_a',
            'equipe_b',
        ],
    ]) ?>

</div>
