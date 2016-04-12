<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CobroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cobro') ?>

    <?= $form->field($model, 'id_alumno') ?>

    <?= $form->field($model, 'id_factura') ?>

    <?= $form->field($model, 'id_recibo') ?>

    <?= $form->field($model, 'id_forma_pago') ?>

    <?php // echo $form->field($model, 'concepto') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'anio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
