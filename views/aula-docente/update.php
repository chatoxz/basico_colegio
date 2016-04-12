<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AulaDocente */

$this->title = 'Update Aula Docente: ' . ' ' . $model->id_aula_docente;
$this->params['breadcrumbs'][] = ['label' => 'Aula Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_aula_docente, 'url' => ['view', 'id' => $model->id_aula_docente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aula-docente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
