<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obra-social-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_obra_social') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'sigla') ?>

    <?= $form->field($model, 'cuota') ?>

    <?= $form->field($model, 'domicilio') ?>

    <?php echo $form->field($model, 'localidad') ?>

    <?php echo $form->field($model, 'telefono') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php echo $form->field($model, 'web') ?>

    <?php echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
