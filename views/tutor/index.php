<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_tutor',
            //'id_persona',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_persona',
                'label'=>'Nombre',
                'value'=>'idPersona.nombre',
            ],
            'ocupacion',
            'descripcion_ocupacion',
            'relacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
