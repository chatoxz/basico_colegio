<?php

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

    $persona_docente = Persona::find()->with('docentes')->all();
    $persona_docente = ArrayHelper::toArray($persona_docente);
    var_dump($persona_docente);
    ?>
    <?= $form->field($model, 'id_docente')->dropDownList(
        ArrayHelper::map($persona_docente,'id_docente','nombre'),
        ['prompt'=>'Docentes']
    ) ?>



    <?= $form->field($model, 'id_docente')->textInput() ?>

    <?= $form->field($model, 'id_aula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
