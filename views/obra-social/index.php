<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObraSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obra Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obra-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obra Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_obra_social',
            'nombre',
            'sigla',
            'cuota',
            'domicilio',
            // 'localidad',
            // 'telefono',
            // 'email:email',
            // 'web',
            // 'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
