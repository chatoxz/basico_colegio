<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $tutor app\models\Tutor */
/* @var $persona app\models\Persona */

$this->title = $persona->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-view">

    <h1><?= Html::encode("Detalle Tutor") ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_tutor' => $tutor->id_tutor, 'id_persona' => $tutor->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_tutor' => $tutor->id_tutor, 'id_persona' => $tutor->id_persona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $tutor,
        'attributes' => [
            //'id_tutor',
            //'id_persona',
            'ocupacion',
            'descripcion_ocupacion',
            'relacion',
        ],
    ]) ?>

    <h1><?= Html::encode("Detalle ") ?></h1>
    <?= DetailView::widget([
        'model' => $persona,
        'attributes' => [
            //'id_persona',
            'nombre',
            'apellido',
            'documento',
            'tipo_documento',
            'domicilio',
            'telefono',
            'celular',
            'fecha_nacimiento',
            'foto',
            'localidad',
            'provincia',
            'codigo_postal',
            'estado_civil',
            'observacion',
        ],
    ]) ?>
</div>
