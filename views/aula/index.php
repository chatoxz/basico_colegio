<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Aula', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Crear Relacion', ['aula-docente/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_aula',
            'nombre',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
