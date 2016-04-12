<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocenteSearchFormaPago */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forma Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forma-pago-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forma Pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_forma_pago',
            'tipo_pago',
            'nombre_banco',
            'numero_cheque',
            'numero_cuenta',
            // 'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
