<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Update Obra Social: ' . ' ' . $model->id_obra_social;
$this->params['breadcrumbs'][] = ['label' => 'Obra Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_obra_social, 'url' => ['view', 'id' => $model->id_obra_social]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obra-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
