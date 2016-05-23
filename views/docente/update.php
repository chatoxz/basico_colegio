<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Docente */

$this->title = 'Actualizar Docente ';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_docente, 'url' => ['view', 'id' => $model->id_docente]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="docente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['persona' => $persona,'docente' => $docente,]) ?>

</div>
