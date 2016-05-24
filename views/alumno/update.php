<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = 'Actualizar Alumno: ' . ' ' . $persona->nombre.'  '.$persona->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $alumno->id_alumno, 'url' => ['view', 'id_alumno' => $alumno->id_alumno, 'id_persona' => $persona->id_persona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alumno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['persona' => $persona,'alumno' => $alumno, 'items' => $items, 'os' => $os]) ?>

</div>
