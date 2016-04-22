<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tutor */

$this->title = ($persona->isNewRecord && $tutor->isNewRecord)? 'Crear' : 'Actualizar'.' Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $persona->nombre;
?>
<div class="tutor-create">

    <h1>Nuevo Tutor</h1>

    <?= $this->render('_form', ['persona' => $persona,'tutor' => $tutor,]) ?>

</div>
