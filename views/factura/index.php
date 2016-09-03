<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <h3>Elegir el alumno al que se desea generar una factura</h3>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterModel' => $searchModel,
        'summary'=>'Listado de Alumnos',
        'showFooter'=>true,
        'showHeader' => true,
        'showOnEmpty'=>true,
        'emptyCell'=>'-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fullName',
            'numero_acta',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_obra_social',
                'label'=>'Obra Social',
                'value'=>'idObraSocial.nombre',
            ],
            'fecha_vencimiento_certificado',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_aula',
                'label'=>'Aula',
                'value'=>'idAula.nombre',
            ],
            //'fecha_ingreso',
            // 'numero_acta',
            // 'tipo_transporte',

            // 'nombre_transporte',
            // 'tel_transporte',
            // 'fecha_vencimiento_certificado',
            // 'fecha_inicio_certificado',
            // 'numero_afiliado',
            [
                'class' => 'yii\grid\ActionColumn',
                //'header'=>'Mod/Detalle/Borrar',
                'header'=>'Acciones',
                'headerOptions' => ['width' => '80'],
                'template' => '{create}',
                'buttons' => [

                    'create' => function ($model,$key,$index) {
                        $url = "create?id_alumno=".$key->id_alumno."&id_persona=".$key->id_persona;
                        return Html::a(
                            '<span style="padding-right: 10px;" class="glyphicon glyphicon-copy"></span>', $url);
                    },
                ],
            ],
        ],
    ]);
    ?>

</div>
