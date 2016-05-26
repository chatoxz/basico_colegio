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
    <h2>Datos Personales</h2>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'nombre')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'apellido')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'tipo_documento')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'documento')->textInput() ?>
        </td>
        <td style="width: 25%">
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
        </td>
        <td>
            <?= $form->field($persona, 'estado_civil')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'telefono')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'celular')->textInput(['maxlength' => true]) ?>
        </td>
    </table>

    <h2>Datos del Domicilio</h2>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'domicilio')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'localidad')->textInput(['maxlength' => true, 'value' => 'San Miguel de Tucuman']) ?>
        </td>
        <td>
            <?= $form->field($persona, 'provincia')->textInput(['maxlength' => true, 'value' => 'Tucuman']);
            ?>
        </td>
        <td>
            <?= $form->field($persona, 'codigo_postal')->textInput(['value' => '4000']) ?>
        </td>
    </table>
    <?php //echo $form->field($persona, 'foto')->fileInput() ?>

    <h2>Datos del Docente</h2>
    <table class="table" >
        <td>
            <?= $form->field($docente, 'numero_boleta')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($docente, 'cargo')->textInput(['maxlength' => true]) ?>
        </td>
        <td style="width: 33%">
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
        </td>
    </table>
    <table class="table" >
        <td>
            <?= $form->field($docente, 'horarios')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($docente, 'turno')->textInput(['maxlength' => true,'placeholder' => "Mañana / Tarde"]) ?>
        </td>
        <td>
            <?= $form->field($docente, 'turno_entrada_salida')->textInput(['maxlength' => true,'placeholder' => "En los que entra y sale"])
                ->label("Horarios de entrada y salida") ?>
        </td>
    </table>
    <table class="table" >
        <td>
            <?= $form->field($docente, 'observacion')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($docente, 'tipo_docente')->textInput(['maxlength' => true,'placeholder' => "Curricular o Especial"])?>
            <?php //Docente curricular( el maestro principal del aula) o docente especial?>
        </td>
    </table>

    <div class="form-group">
        <?= Html::submitButton($persona->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $persona->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
