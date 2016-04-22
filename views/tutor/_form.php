<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $tutor app\models\Tutor */
/* @var $persona app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($persona, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'documento')->textInput() ?>

    <?= $form->field($persona, 'tipo_documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($persona, 'foto')->fileInput() ?>

    <?= $form->field($persona, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'codigo_postal')->textInput() ?>

    <?= $form->field($persona, 'estado_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'observacion')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($tutor, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($tutor, 'descripcion_ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($tutor, 'relacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(( $persona->isNewRecord )? 'Create' : 'Update', ['class' => ($persona->isNewRecord ) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
