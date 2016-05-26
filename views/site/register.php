<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rol;
?>

<?php
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/users/index']];
$this->params['breadcrumbs'][] = 'Registro';
?>

    <h3><?php echo $msg ?></h3>

    <h1>Register</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
]);
?>
    <div class="form-group">
        <?= $form->field($model, "username")->input("text")->label('Usuario') ?>
    </div>

    <!--<div class="form-group">
    <?/*= $form->field($model, "email")->input("email") */?>
</div>-->

    <div class="form-group">
        <?= $form->field($model, "password")->input("password")->label('Contraseña') ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, "password_repeat")->input("password") ?>
    </div>

<?= $form->field($model, 'id_rol')->dropDownList(
    ArrayHelper::map(Rol::find()->all(),'id_rol','nombre'),
    ['prompt'=>'Roles'])
?>

<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>