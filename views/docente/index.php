<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Docente;


/* @var $this yii\web\View */
/* @var $searchModel app\models\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Docente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $url = 'create';
    //$url = ActionColumn::createUrl($action, $model, $key, $index);
    //$models = $dataProvider->getModels();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'summary'=>'Listado de Docentes',
        'showFooter'=>true,
        'showHeader' => true,
        'showOnEmpty'=>true,
        'emptyCell'=>'-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_docente',
            //'id_persona',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_persona',
                'label'=>'Nombre',
                'value'=>'idPersona.nombre',
            ],
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_persona',
                'label'=>'Apellido',
                'value'=>'idPersona.apellido',
            ],
            //'numero_boleta',
            'turno',
            'cargo',
            //'fecha_ingreso',
            //'horarios',
           
            //'turno_entrada_salida',
            //'observacion',
            'tipo_docente',

            [
                'class' => 'yii\grid\ActionColumn',
                //'header'=>'Mod/Detalle/Borrar',
                'header'=>'Acciones',
                'headerOptions' => ['width' => '80'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($model,$key,$index) {
                        $url = "view?id_docente=".$key->id_docente."&id_persona=".$key->id_persona;
                        //var_dump($model);
                        //var_dump($key);
                        return Html::a(
                            '<span style="padding-right: 10px;" class="glyphicon glyphicon-eye-open"></span>', $url);
                    },
                    'update' => function ($model,$key,$index) {
                        $url = "update?id_docente=".$key->id_docente."&id_persona=".$key->id_persona;
                        return Html::a(
                            '<span style="padding-right: 10px;" class="glyphicon glyphicon-pencil"></span>', $url);
                    },
                    'delete' => function ($url,$model,$key) {
                        return Html::a('', ['delete', 'id_docente' => $model->id_docente, 'id_persona' => $model->id_persona],
                            [
                                'class' => 'glyphicon glyphicon-trash',
                                'data' => [
                                    'confirm' => '¿Está segur@ que desesa borrar el docente?',
                                    'method' => 'post',
                                ],
                            ]) ;
                    },
                ],
            ],
            //'class' => 'yii\grid\ActionColumn'],
            //['class' => 'yii\grid\CheckBoxColumn'],
            //['class' => 'yii\grid\DataColumn'],
        ],
    ]); ?>

</div>
