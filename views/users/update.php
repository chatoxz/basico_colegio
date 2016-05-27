<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rol;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
?>

<?php
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['/users/index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = ['Update user: '. $model->id;
?>

<h1>Actualizar</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
]);
?>

<div class="form-group">
    <?= $form->field($model, "username")->label("Nombre de Usuario")->input("text") ?>
</div>

<div class="form-group">
    <?= $form->field($model, "password")->label("Contraseña")->input("password") ?>
</div>

<?= $form->field($model, 'id_rol')->label("Rol")->dropDownList(
    ArrayHelper::map(Rol::find()->all(),'id_rol','nombre'),
    ['prompt'=>'Roles'])
?>

<?= Html::submitButton("Update", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>