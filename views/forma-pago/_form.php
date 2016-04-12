<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forma-pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_pago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_banco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_cheque')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
