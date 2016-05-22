<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = 'Nuevo Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-create">

    <h1>Nuevo Alumno</h1>

    <?= $this->render('_form', ['persona' => $persona,'alumno' => $alumno, 'items' => $items, 'os' => $os]) ?>

</div>