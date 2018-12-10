<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquipeGrupo */

$this->title = Yii::t('app', 'Update Equipe Grupo: ' . $model->equipe_nome, [
    'nameAttribute' => '' . $model->equipe_nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipe Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipe_nome, 'url' => ['view', 'equipe_nome' => $model->equipe_nome, 'grupo_idgrupo' => $model->grupo_idgrupo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipe-grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
