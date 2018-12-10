<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Entrar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('/campelada/web/autenticacao/images/bg-03.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <a href="<?=Url::toRoute('site/index')?>" class="simple-text"  style="float: left;">
                <img src="/campelada/web/usuario/img/campelada-icon.png" style="height: 60px;">
            </a>
            <span class="login100-form-title p-b-41">
                Entrar
            </span>
            <?php $form = ActiveForm::begin(['options'=>['class'=>'login100-form validate-form p-b-33 p-t-5']/*,'fieldConfig'=>['parts'=>['{hint}'=>'<span class="focus-input100" data-placeholder="&#xe82a;"></span>','template'=>"{input}\n{focus}\n{hint}\n{error}"]]*/]); ?>
            <!--<form class="login100-form validate-form p-b-33 p-t-5">-->
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <?=Html::activeTextInput($model,'email',['class'=> 'input100','placeholder'=>'Usuário'])?>
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                 <?php //$form->field($model, 'email')->textInput(['class'=> 'input100','placeholder'=>'Usuário'])->label(false)  ?>
                </div>

             <div class="wrap-input100 validate-input" data-validate="Enter password">
                <?=Html::activePasswordInput($model,'senha',['class'=> 'input100','placeholder'=>'Senha'])?>
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                <?php // $form->field($model, 'senha')->passwordInput(['class'=> 'input100','placeholder'=>'Senha'])->label(false) ?>
            </div>
            <div class="wrap-input100 validate-input ml-4">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>

            <div class="container-login100-form-btn m-t-32">
                <?= Html::submitButton('Entrar', ['class' => 'login100-form-btn', 'name' => 'entrar-button']) ?>
                <a href="<?=Url::toRoute('usuario/create')?>" class="login100-form-btn">Cadastre-se</a>
            </div>
        <!--</form>-->
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>

<div id="dropDownSelect1"></div>

