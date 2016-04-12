<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlumnoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alumno') ?>

    <?= $form->field($model, 'id_persona') ?>

    <?= $form->field($model, 'id_obra_social') ?>

    <?= $form->field($model, 'id_aula') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?php // echo $form->field($model, 'numero_acta') ?>

    <?php // echo $form->field($model, 'tipo_transporte') ?>

    <?php // echo $form->field($model, 'nombre_transporte') ?>

    <?php // echo $form->field($model, 'tel_transporte') ?>

    <?php // echo $form->field($model, 'fecha_vencimiento_certificado') ?>

    <?php // echo $form->field($model, 'fecha_inicio_certificado') ?>

    <?php // echo $form->field($model, 'numero_afiliado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
