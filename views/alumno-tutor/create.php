<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AlumnoTutor */

$this->title = 'Create Alumno Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Alumno Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-tutor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
