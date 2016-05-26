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
        <?= Html::a('Crear Relacion Docente/Aula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_aula_docente',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_docente',
                'label'=>'Docente',
                'value'=>'idDocente.idPersona.nombre',
            ],
            //'id_docente',
            [
                //hace referencia a  public function attributeLabels()
                'attribute'=>'id_aula',
                'label'=>'Aula',
                'value'=>'idAula.nombre',
            ],
            //'id_aula',

            ['class' => 'yii\grid\ActionColumn',
             'header'=>'Acciones',
            ],
        ],
    ]); ?>

</div>
