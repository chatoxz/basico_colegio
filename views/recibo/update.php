<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recibo */

$this->title = 'Update Recibo: ' . ' ' . $model->id_recibo;
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_recibo, 'url' => ['view', 'id' => $model->id_recibo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recibo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
