<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($persona, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'documento')->textInput() ?>

    <?= $form->field($persona, 'tipo_documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'celular')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($persona, 'fecha_nacimiento')->textInput() ?>
    <?= $form->field($persona, 'fecha_nacimiento')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'value' => $persona->fecha_nacimiento,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]);?>

    <?= $form->field($persona, 'foto')->fileInput() ?>

    <?= $form->field($persona, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'codigo_postal')->textInput() ?>

    <?= $form->field($persona, 'estado_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($persona, 'observacion')->textInput(['maxlength' => true]) ?>


    <?= $form->field($docente, 'numero_boleta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($docente, 'cargo')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($docente, 'fecha_ingreso')->textInput() ?>
    <?= $form->field($docente, 'fecha_ingreso')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'value' => $persona->fecha_nacimiento,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]);?>
    <?= $form->field($docente, 'horarios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($docente, 'turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($docente, 'turno_entrada_salida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($docente, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($docente, 'tipo_docente')->textInput(['maxlength' => true]) ?>
    <?php //Docente curricular( el maestro principal del aula) o docente especial?>
    

    <div class="form-group">
        <?= Html::submitButton($persona->isNewRecord ? 'Create' : 'Update', ['class' => $persona->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
