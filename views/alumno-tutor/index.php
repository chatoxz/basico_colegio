<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoTutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumno Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alumno Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alumno_tutor',
            'id_alumno',
            'id_tutor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
