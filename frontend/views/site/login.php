<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use common\models\Usuarios2;


$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>SEDE</b>SEM</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <img src="http://edomex.gob.mx/sites/edomex.gob.mx/files/h1_0.png" alt="Logotipo de HTML5" width="300" height="100" align="center">
        <p class="login-box-msg">Iniciar Sesión</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'NOMBRE_USUARIO', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('NOMBRE_USUARIO')]) ?>

        <?= $form
            ->field($model, 'PASSWORD_1', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('PASSWORD_1')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Iniciar', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
