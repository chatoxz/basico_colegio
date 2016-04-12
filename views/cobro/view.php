<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cobro */

$this->title = $model->id_cobro;
$this->params['breadcrumbs'][] = ['label' => 'Cobros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_cobro' => $model->id_cobro, 'id_alumno' => $model->id_alumno, 'id_factura' => $model->id_factura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_cobro' => $model->id_cobro, 'id_alumno' => $model->id_alumno, 'id_factura' => $model->id_factura], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cobro',
            'id_alumno',
            'id_factura',
            'id_recibo',
            'id_forma_pago',
            'concepto',
            'monto',
            'observacion',
            'fecha',
            'mes',
            'anio',
        ],
    ]) ?>

</div>
