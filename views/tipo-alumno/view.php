<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoAlumno */

$this->title = $model->id_tipo_alumno;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-alumno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_tipo_alumno' => $model->id_tipo_alumno, 'id_alumno' => $model->id_alumno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_tipo_alumno' => $model->id_tipo_alumno, 'id_alumno' => $model->id_alumno], [
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
            'id_tipo_alumno',
            'id_alumno',
            'nombre',
        ],
    ]) ?>

</div>
