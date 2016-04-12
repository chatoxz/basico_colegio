<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaDocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aula Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-docente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aula Docente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_aula_docente',
            'id_docente',
            'id_aula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
