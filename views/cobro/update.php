<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cobro */

$this->title = 'Update Cobro: ' . ' ' . $model->id_cobro;
$this->params['breadcrumbs'][] = ['label' => 'Cobros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cobro, 'url' => ['view', 'id_cobro' => $model->id_cobro, 'id_alumno' => $model->id_alumno, 'id_factura' => $model->id_factura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cobro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
