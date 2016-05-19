<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */

$this->title = $persona->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_docente' => $docente->id_docente, 'id_persona' => $docente->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_docente' => $docente->id_docente, 'id_persona' => $docente->id_persona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea borrar el docente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $docente,
        'attributes' => [
            //'id_docente',
            //'id_persona',
            'numero_boleta',
            'cargo',
            'fecha_ingreso',
            'horarios',
            'turno',
            'turno_entrada_salida',
            'observacion',
            'tipo_docente',
            'observacion',
        ],
    ]) ?>
    <h1><?= Html::encode("Detalle Personal") ?></h1>
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
        ],
    ]) ?>

</div>
