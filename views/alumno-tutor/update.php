<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlumnoTutor */

$this->title = 'Update Alumno Tutor: ' . ' ' . $model->id_alumno_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Alumno Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alumno_tutor, 'url' => ['view', 'id_alumno_tutor' => $model->id_alumno_tutor, 'id_alumno' => $model->id_alumno, 'id_tutor' => $model->id_tutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alumno-tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
