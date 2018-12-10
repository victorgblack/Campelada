<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Usuario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'idusuario',
            'email:email',
            'senha',
            //'auth_key',
            //'access_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php
$grupo='grupo';
for ($i=1 ; $i <= 5  ; $i++ )
    print_r($grupo.$i);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Meus campeonatos</h4>
                        <p class="category">Resumo dos campeonatos criados por você</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>Nome</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($campeonatos as $campeonato) {
                                ?>
                                <tr>
                                    <td><?=$campeonato->nome?>
                                        <button class="ti-eye btn btn-success" style="float: right;">   Gerenciar</button>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>