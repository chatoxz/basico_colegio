<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Docente */

$this->title = 'Crear Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Crear Docente';
?>
<div class="docente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['persona' => $persona,'docente' => $docente,]) ?>

</div>
