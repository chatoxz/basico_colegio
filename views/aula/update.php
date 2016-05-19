<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aula */

$this->title = 'Actualizar: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="aula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
