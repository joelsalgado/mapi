<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 09:42 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Beneficiarios';

?><h1>Selecciona el Bimestre</h1>

<?= Html::beginForm(
    Url::toRoute("beneficiarios/index"),//action
    "get",//method
    ['class' => 'form-inline']//options
);
?>

    <div class="form-group">
        <?= Html::dropDownList("id",  null, [2 => 'Enero-Febrero', 4 => 'Marzo-Abril', 6 =>'Mayo-Junio',
            8 => 'Julio-Agosto' , 10 => 'Septiembre-Octubre', 12=>'Noviembre-Diciembre'], ["class" => "form-control", 'requiered' => true]) ?>
    </div>

<?= Html::submitInput("Enviar", ["class" => "btn btn-primary"]) ?>

<?= Html::endForm() ?>