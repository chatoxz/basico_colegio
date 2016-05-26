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
        'filterModel' => $searchModel,
        'summary'=>'Listado de Alumnos',
        'showFooter'=>true,
        'showHeader' => true,
        'showOnEmpty'=>true,
        'emptyCell'=>'-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_persona',
                'label'=>'Documento',
                'value'=>'idPersona.documento',
            ],
            'numero_acta',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_obra_social',
                'label'=>'Obra Social',
                'value'=>'idObraSocial.nombre',
            ],
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_aula',
                'label'=>'Aula',
                'value'=>'idAula.nombre',
            ],
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'feche_vencimiento_certificado',
                'label'=>'Fecha Vencimiento certificado',
                'value'=>'fecha_vencimiento_certificado',
            ],
            //'fecha_ingreso',
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
