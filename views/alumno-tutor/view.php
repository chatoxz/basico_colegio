<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlumnoTutor */

$this->title = $model->id_alumno_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Alumno Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-tutor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_alumno_tutor' => $model->id_alumno_tutor, 'id_alumno' => $model->id_alumno, 'id_tutor' => $model->id_tutor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_alumno_tutor' => $model->id_alumno_tutor, 'id_alumno' => $model->id_alumno, 'id_tutor' => $model->id_tutor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_alumno_tutor',
            'id_alumno',
            'id_tutor',
        ],
    ]) ?>

</div>
