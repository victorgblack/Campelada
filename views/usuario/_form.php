<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="limiter">
	<div class="container-login100" style="background-image: url('/campelada/web/autenticacao/images/bg-02.jpg');">
		<div class="wrap-login100 p-t-30 p-b-50">
			<a href="<?=Url::toRoute('site/index')?>" class="simple-text"  style="float: left;">
				<img src="/campelada/web/usuario/img/campelada-icon.png" style="height: 60px;">
			</a>
			<span class="login100-form-title p-b-41">
				Cadastrar-se
			</span>
			<?php $form = ActiveForm::begin(['options'=>['class'=>'login100-form validate-form p-b-33 p-t-5']/*,'fieldConfig'=>['parts'=>['{hint}'=>'<span class="focus-input100" data-placeholder="&#xe82a;"></span>','template'=>"{input}\n{focus}\n{hint}\n{error}"]]*/]); ?>
			<!--<form class="login100-form validate-form p-b-33 p-t-5">-->

				<div class="wrap-input100 validate-input" data-validate = "nome">
					<?=Html::activeTextInput($model,'nome',['class'=> 'input100','placeholder'=>'Nome'])?>
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                 <?php //$form->field($model, 'email')->textInput(['class'=> 'input100','placeholder'=>'Usuário'])->label(false)  ?>
				</div>

				<div class="wrap-input100 validate-input" data-validate="email">
					<?=Html::activeTextInput($model,'email',['class'=> 'input100','placeholder'=>'E-mail'])?>
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                 <?php //$form->field($model, 'email')->textInput(['class'=> 'input100','placeholder'=>'Usuário'])->label(false)  ?>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<?=Html::activeTextInput($model,'senha',['class'=> 'input100','placeholder'=>'Senha'])?>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                 <?php //$form->field($model, 'email')->textInput(['class'=> 'input100','placeholder'=>'Usuário'])->label(false)  ?>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<?=Html::activeTextInput($model,'senha_repete',['class'=> 'input100','placeholder'=>'Repita a senha'])?>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                 <?php //$form->field($model, 'email')->textInput(['class'=> 'input100','placeholder'=>'Usuário'])->label(false)  ?>
				</div>

				<div class="container-login100-form-btn m-t-32">
					<?= Html::submitButton(Yii::t('app', 'Cadastrar-se'), ['class' => 'login100-form-btn']) ?>
					<a href="<?=Url::toRoute('site/login')?>" class="login100-form-btn">Entrar</a>
				</div>

			<!--</form>-->
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>