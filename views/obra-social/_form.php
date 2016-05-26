<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obra-social-form">


    <?php $form = ActiveForm::begin(); ?>
    <h2>Datos de la Obra Social</h2>
    <table class="table" >
        <td>
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
     <table class="table" >
        <td>
            <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <h2>Datos de Contacto</h2>
     <table class="table" >
        <td>
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($model, 'web')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <h2>Otros Datos </h2>
     <table class="table" >
        <td>
            <?= $form->field($model, 'cuota')->textInput() ?>
        </td>
        <td>
            <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
