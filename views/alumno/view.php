<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = $model->id_alumno;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_alumno' => $model->id_alumno, 'id_persona' => $model->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_alumno' => $model->id_alumno, 'id_persona' => $model->id_persona], [
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
            'id_alumno',
            'id_persona',
            'id_obra_social',
            'id_aula',
            'fecha_ingreso',
            'numero_acta',
            'tipo_transporte',
            'nombre_transporte',
            'tel_transporte',
            'fecha_vencimiento_certificado',
            'fecha_inicio_certificado',
            'numero_afiliado',
        ],
    ]) ?>

</div>
