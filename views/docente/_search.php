<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_docente') ?>

    <?= $form->field($model, 'id_persona') ?>

    <?= $form->field($model, 'numero_boleta') ?>

    <?= $form->field($model, 'cargo') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?php // echo $form->field($model, 'horarios') ?>

    <?php // echo $form->field($model, 'turno') ?>

    <?php // echo $form->field($model, 'turno_entrada_salida') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'tipo_docente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
