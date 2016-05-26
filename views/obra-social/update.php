<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Actualizar Obra Social: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Obra Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar Obra Social';
//$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'nombre' => $model->nombre]];



?>
<div class="obra-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
