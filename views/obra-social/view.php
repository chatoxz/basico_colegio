<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Obra Social: ' . ' ' . $model->nombre;
//$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Obra Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ver Obra Social';
//$this->params['breadcrumbs'][] = $this->title;


?>
<div class="obra-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_obra_social], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_obra_social], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás segur@ que desea borrar esta Obra Social?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
     <?= DetailView::widget([
      //  <?= CListView::widget([
        'model' => $model,
        'attributes' => [
            //'id_obra_social',
            'nombre',
            'sigla',
            'cuota',
            'domicilio',
            'localidad',
            'telefono',
            'email:email',
            'web',
            'observacion',
        ],
    ]) ?>

</div>
