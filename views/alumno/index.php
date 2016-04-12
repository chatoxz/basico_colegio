<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alumno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alumno',
            'id_persona',
            'id_obra_social',
            'id_aula',
            'fecha_ingreso',
            // 'numero_acta',
            // 'tipo_transporte',
            // 'nombre_transporte',
            // 'tel_transporte',
            // 'fecha_vencimiento_certificado',
            // 'fecha_inicio_certificado',
            // 'numero_afiliado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
