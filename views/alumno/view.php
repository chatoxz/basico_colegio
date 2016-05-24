<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = $persona->nombre.' '.$persona->apellido ;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_alumno' => $alumno->id_alumno, 'id_persona' => $alumno->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id_alumno' => $alumno->id_alumno, 'id_persona' => $alumno->id_persona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $persona,
        'attributes' => [
            //'id_persona',
            'nombre',
            'apellido',
            'documento',
            'domicilio',
            'tipo_documento',
            'telefono',
            'celular',
            'fecha_nacimiento',
            //'foto',
            'localidad',
            'provincia',
            //'codigo_postal',
            //'estado_civil',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $alumno,
        'attributes' => [
            'idAula.nombre',
            'numero_acta',
            'nombre_transporte',
            'tel_transporte',
           // 'fecha_vencimiento_certificado',
           // 'fecha_inicio_certificado',
        ],
    ]) ?>

</div>
