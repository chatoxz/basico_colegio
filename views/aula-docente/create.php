<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AulaDocente */

$this->title = 'Crear Relacion Docente/Aula';
$this->params['breadcrumbs'][] = ['label' => 'Aula Docentes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-docente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
