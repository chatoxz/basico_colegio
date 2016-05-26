<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rol;
?>

<?php
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['/users/index']];
$this->params['breadcrumbs'][] = 'Registro';
?>

    <h3><?php echo $msg ?></h3>

    <h1>Registro de Usuarios</h1>
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

    <!--<div class="form-group">
    <?/*= $form->field($model, "email")->input("email") */?>
</div>-->

    <div class="form-group">
        <?= $form->field($model, "password")->label("Contraseña")->input("password") ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, "password_repeat")->label("Repita la Contraseña")->input("password") ?>
    </div>

<?= $form->field($model, 'id_rol')->label("Roles")->dropDownList(
    ArrayHelper::map(Rol::find()->all(),'id_rol','nombre'),
    ['prompt'=>'Seleccione un Rol'])
?>

<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>