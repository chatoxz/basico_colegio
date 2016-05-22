<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AulaDocente */

//$this->title = $aula_docente->id_aula_docente;
$this->params['breadcrumbs'][] = ['label' => 'Aula Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-docente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $aula_docente->id_aula_docente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $aula_docente->id_aula_docente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desesa borrar la relacion?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $aula_docente,
        'attributes' => [
            //'id_aula_docente',
            'idDocente.idPersona.nombre',          
            'idAula.nombre',
        ],
    ]) ?>

</div>
