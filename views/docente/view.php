<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */

//$this->title = $persona->nombre." ".$persona->apellido;
$this->title = 'Datos del Docente: ' . ' ' . $persona->nombre." ".$persona->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-view">

    <h1><?= Html::encode($this->title) ?></h1>

        
    <h2><?= Html::encode("Datos Personales") ?></h2>
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
    
     <h2><?= Html::encode("Otros Datos") ?></h2>
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
            'tipo_docente',
            'observacion',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Actualizar', ['update', 'id_docente' => $docente->id_docente, 'id_persona' => $docente->id_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_docente' => $docente->id_docente, 'id_persona' => $docente->id_persona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está segur@ que desea borrar el docente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
