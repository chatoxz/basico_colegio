<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cobro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_alumno')->textInput() ?>

    <?= $form->field($model, 'id_factura')->textInput() ?>

    <?= $form->field($model, 'id_recibo')->textInput() ?>

    <?= $form->field($model, 'id_forma_pago')->textInput() ?>

    <?= $form->field($model, 'concepto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'mes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
