<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tutor */

$this->title = 'Update Tutor: ' . ' ' . $model->id_tutor;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tutor, 'url' => ['view', 'id_tutor' => $model->id_tutor, 'id_persona' => $model->id_persona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
