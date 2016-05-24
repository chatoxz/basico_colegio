<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tutor */

$this->title = 'Actualizar Tutor: ' . ' ' . $tutor->id_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['persona' => $persona,'tutor' => $tutor,]) ?>


</div>
