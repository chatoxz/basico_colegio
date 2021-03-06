<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Crear Obra Social';
$this->params['breadcrumbs'][] = ['label' => 'Obra Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="obra-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
