<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPagoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forma-pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_forma_pago') ?>

    <?= $form->field($model, 'tipo_pago') ?>

    <?= $form->field($model, 'nombre_banco') ?>

    <?= $form->field($model, 'numero_cheque') ?>

    <?= $form->field($model, 'numero_cuenta') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
