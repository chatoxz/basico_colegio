<?php

use app\models\Aula;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Docente;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\AulaDocente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aula-docente-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $query = new Query;
    $query  ->select(['id_docente','nombre'])
        ->from('persona')
        ->join('join','docente','persona.id_persona = docente.id_persona');
    $command = $query->createCommand();
    $personas = $command->queryAll();
    ?>
    <?= $form->field($model, 'id_docente')->label('Docente')->dropDownList(
        ArrayHelper::map($personas, 'id_docente','nombre'))
    ?>

    <?= $form->field($model, 'id_aula')->label('Aula')->dropDownList(
        ArrayHelper::map(Aula::find()->all(), 'id_aula','nombre'))
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
