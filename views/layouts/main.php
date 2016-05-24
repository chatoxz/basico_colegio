<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<br>
<br>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('/STlogoBlue100.png'),
        //'brandUrl' => Yii::$app->homeUrl,
        'brandUrl' => "alumno/index",
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Home', 'url' => ['/site/index']],
            //['label' => 'Personas', 'url' => ['/persona/index']],
            ['label' => 'Usuarios', 'url' => ['/users/index']],
            ['label' => 'Alumnos', 'url' => ['/alumno/index']],
            [
                'class' => '' ,
                'label' => 'Aulas',
                'items' => [
                    ['label' => 'Aulas', 'url' => ['/aula/index']],
                    ['label' => 'Docentes y Aulas', 'url' => ['/aula-docente/index']],
                    //'<li class="divider"></li>',
                ],
            ],
            ['label' => 'Docentes', 'url' => ['/docente/index']],
            ['label' => 'Obra Social', 'url' => ['/obra-social/index']],
            ['label' => 'Tutor', 'url' => ['/tutor/index']],

            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; San Tarcisio <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
