<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use kartik\nav\NavX;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap" id="index-page">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="<?= Url::to(['site/index']) ?>"><img src="/img/logo.png"></a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['site/free-section']) ?>">Бесплатные базы данных</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['site/paid-section']) ?>">Платные базы данных</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                МегаполисУслуг.Ру, <?= date('Y') ?>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
