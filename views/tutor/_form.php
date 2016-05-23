<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $tutor app\models\Tutor */
/* @var $persona app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'nombre')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'apellido')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
        </td>
        <td>
            <?php echo $form->field($persona, 'tipo_documento')->label('Tipo')->dropDownList(['0' => 'Seleccione Tipo..', 'DNI' => 'DNI', 'CI' => 'CI', 'LD' => 'LD' ,'LC' => 'LC']); ?>
        </td>
        <td>
            <?= $form->field($persona, 'documento')->textInput(['maxlength' => true]) ?>
        </td>
    </table>

    <table class="table" >
        <td>
            <?= $form->field($persona, 'domicilio')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'telefono')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($persona, 'celular')->textInput(['maxlength' => true]) ?>
        </td>
    </table>
    <table class="table">
        <td style="width:25%">
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
            <?= $form->field($persona, 'localidad')->textInput(['maxlength' => true, 'value' => 'San Miguel de Tucuman']) ?>
        </td>
        <td>
            <?= $form->field($persona, 'provincia')->textInput(['maxlength' => true, 'value' => 'Tucuman']); ?>
        </td>
        <td>
            <?= $form->field($persona, 'codigo_postal')->textInput(['value' => '4000']) ?>
        </td>
    </table>

    <table class="table" >
        <td>
            <?= $form->field($tutor, 'ocupacion')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?= $form->field($tutor, 'descripcion_ocupacion')->textInput(['maxlength' => true]) ?>
        </td>
        <td>
            <?php echo $form->field($tutor, 'relacion')->label('Relación')->dropDownList(['0' => 'Seleccione..',
                'Padre' => 'Padre', 'Madre' => 'Madre', 'Hermano/a' => 'Hermano/a' ,'Tio/a' => 'Tio/a','Primo/a' ,'otro' => 'otro']); ?>
        </td>
    </table>
    <table class="table" >
        <td>
            <?= $form->field($persona, 'observacion')->textInput(['maxlength' => true]) ?>
        </td>
    </table>



    <div class="form-group">
        <?= Html::submitButton(( $persona->isNewRecord )? 'Crear' : 'Actualizar', ['class' => ($persona->isNewRecord ) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php /*

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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


    <?= $form->field($tutor, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($tutor, 'descripcion_ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($tutor, 'relacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(( $persona->isNewRecord )? 'Create' : 'Update', ['class' => ($persona->isNewRecord ) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     */?>

    <?php ActiveForm::end(); ?>

</div>


<s