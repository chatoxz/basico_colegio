<?php

 use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $tutor app\models\Tutor */
/* @var $persona app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-form form-horizontal">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Nombre</td>
            <td>Apellido</td>
        </tr>
        <td>
            <input type="text" id="persona-nombre" class="form-control input-md"  name="Persona[nombre]" maxlength="150">
        </td>
        <td>
            <input type="text" id="persona-apellido" class="form-control input-md" name="Persona[apellido]" maxlength="150">
        </td>

    </table>

    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Tipo Documento</td>
            <td>Documento</td>
            <td>Domicilio</td>
        </tr>
        <td>
            <?php //echo $form->field($persona, 'tipo_documento')->dropDownList(['0' => 'Seleccione Tipo..', 'DNI' => 'DNI','CI' => 'CI',  'LD' => 'LD' , 'LC' => 'LC']); ?>
            <select id="persona-tipo_documento" class="form-control" name="Persona[tipo_documento]">
                <option value="0">Seleccione Tipo..</option>
                <option value="DNI">DNI</option>
                <option value="CI">CI</option>
                <option value="LD">LD</option>
                <option value="LC">LC</option>
            </select>
        </td>
        <td>
            <input type="text" id="persona-documento" class="form-control input-md"  name="Persona[documento]" maxlength="150">
        </td>
        <td>
            <input type="text" id="persona-domicilio" class="form-control input-md" name="Persona[domicilio]" maxlength="150">
        </td>
    </table>

    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Telefono</td>
            <td>celular</td>
            <td>Fecha de Nacimiento</td>
        </tr>
        <td>
            <input type="text" id="persona-telefono" class="form-control input-md" name="Persona[telefono]" maxlength="150">
        </td>
        <td>
            <input type="text" id="persona-celular" class="form-control input-md"  name="Persona[celular]" maxlength="150">
        </td>
        <td>
            <input type="date" id="persona-fecha_nacimiento" class="form-control input-md" name="Persona[fecha_nacimiento]"  value="<?php echo date("Y-m-d") ?>">
        </td>
    </table>

    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Foto</td>
            <td>Localidad</td>
            <td>Provincia</td>
            <td>Codigo Postal</td>
            <td>Estado Civil</td>

        </tr>
        <td>
            <input type="text" id="persona-foto" class="form-control input-md" name="Persona[foto]" maxlength="150">
        </td>
        <td>
            <input type="text" id="persona-localidad" class="form-control input-md"  name="Persona[localidad]" maxlength="150">
        </td>
        <td>
            <input type="text" id="persona-provincia" class="form-control input-md" name="Persona[provincia]"  ">
        </td>
        <td>
            <input type="text" id="persona-codigo_postal" class="form-control input-md" name="Persona[codigo_postal]" >
        </td>
        <td>
            <select id="persona-estado_civil" class="form-control" name="Persona[estado_civil]">
                <option value="0">Seleccione estado civil</option>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Divorciado/a">Divorciado/a</option>
                <option value="Viudo/a">Viudo/a</option>
            </select>
        </td>
    </table>

    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Observación</td>
        </tr>
        <td>
            <input type="text" id="persona-observacion" class="form-control input-md" name="Persona[observacion]" maxlength="150">
        </td>
    </table>

    <table class="table" >
        <tr class="est_selector_table" style="font-style: italic;">
            <td>Ocupación</td>
            <td>Descripción</td>
            <td>Relación</td>
        </tr>
        <td>
            <input type="text" id="tutor-ocupacion" class="form-control input-md" name="Tutor[ocupacion]" maxlength="150">
        </td>
        <td>
            <input type="text" id="Tutor-descripcion_ocupacion" class="form-control input-md"  name="Tutor[descripcion_ocupacion]" maxlength="150">
        </td>
        <td>
            <select id="Tutor-relacion" class="form-control" name="Tutor[relacion]">
                <option value="0">Seleccione relación..</option>
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Hermano/a">Hermano/a</option>
                <option value="Tio/a">Tio/a</option>
                <option value="otro">otro</option>
            </select>
        </td>
    </table>


    <div class="form-group">
        <?= Html::submitButton(( $persona->isNewRecord && $tutor->isNewRecord)? 'Create' : 'Update', ['class' => ($persona->isNewRecord && $tutor->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
