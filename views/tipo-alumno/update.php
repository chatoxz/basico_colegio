<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoAlumno */

$this->title = 'Update Tipo Alumno: ' . ' ' . $model->id_tipo_alumno;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_alumno, 'url' => ['view', 'id_tipo_alumno' => $model->id_tipo_alumno, 'id_alumno' => $model->id_alumno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-alumno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
