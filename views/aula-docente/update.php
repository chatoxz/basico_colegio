<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AulaDocente */

$this->title = 'Actualizar Relacion';
$this->params['breadcrumbs'][] = ['label' => 'Aula Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="aula-docente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
