<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-form">

    <div class="alumno-form">

        <?php $form = ActiveForm::begin(); ?>
        <h2>Datos del Alumno</h2>
        <table class="table" >
            <tr class="est_selector_table" style="font-style: italic;">
            </tr>
            <td>
                <?= $form->field($persona, 'nombre')->textInput(['maxlength' => true]) ?>
            </td>
            <td>
                <?= $form->field($persona, 'apellido')->textInput(['maxlength' => true]) ?>
            </td>
        </table>
        <table class="table" >
            <td>
                <?php echo $form->field($persona, 'tipo_documento')->label('Tipo')->dropDownList(['0' => 'Seleccione Tipo..', 'DNI' => 'DNI', 'CI' => 'CI', 'PAS' => 'PAS' ,'LC' => 'LC', 'LD' => 'LD']); ?>
            </td>
            <td>
                <?= $form->field($persona, 'documento')->textInput(['maxlength' => true]) ?>
            </td>
        </table>
        <table class="table">
            <td>
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
        </table>
        <table class="table">
            <td>
                <?= $form->field($alumno, 'numero_acta')->textInput(['maxlength' => true]) ?>
            </td>
        </table>
        <h2>Datos del Domicilio Particular</h2>
        <table class="table" >
            <td>
                <?= $form->field($persona, 'domicilio')->textInput(['maxlength' => true]) ?>
            </td>
            <td>
                <?= $form->field($persona, 'localidad')->textInput(['maxlength' => true]) ?>
            </td>
            <td>
                <?= $form->field($persona, 'provincia')->textInput(['maxlength' => true]) ?>
            </td>
            <td>
                <?= $form->field($persona, 'codigo_postal')->textInput(['maxlength' => true]) ?>
            </td>
        </table>
        <table class="table" >
            <td>
                <?= $form->field($persona, 'observacion')->textInput(['maxlength' => true]) ?>
            </td>
        </table>


    <?= $form->field($alumno, 'id_persona')->textInput() ?>

    <?= $form->field($alumno, 'id_obra_social')->textInput() ?>

    <?= $form->field($alumno, 'id_aula')->textInput() ?>

    <?= $form->field($alumno, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($alumno, 'numero_acta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'tipo_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'nombre_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'tel_transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'fecha_vencimiento_certificado')->textInput() ?>

    <?= $form->field($alumno, 'fecha_inicio_certificado')->textInput() ?>

    <?= $form->field($alumno, 'numero_afiliado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'info_domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($alumno, 'seccional')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($alumno->isNewRecord ? 'Create' : 'Update', ['class' => $alumno->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
