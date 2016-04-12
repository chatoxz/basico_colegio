<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = $model->id_obra_social;
$this->params['breadcrumbs'][] = ['label' => 'Obra Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obra-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_obra_social], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_obra_social], [
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
            'id_obra_social',
            'nombre',
            'cuota',
            'observacion',
        ],
    ]) ?>

</div>
