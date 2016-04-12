<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_persona')->textInput() ?>

    <?= $form->field($model, 'id_obra_social')->textInput() ?>

    <?= $form->field($model, 'id_aula')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'numero_acta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_vencimiento_certificado')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio_certificado')->textInput() ?>

    <?= $form->field($model, 'numero_afiliado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
