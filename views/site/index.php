<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Много Баз';


?>
<div class="row row-cols-1 row-cols-lg-3 mt-4" id="index">
    <div class="col mb-3">
        <div class="card border-success h-100">
            <h4 class="card-header bg-success">Бесплатные базы данных</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <p class="mb-4"><a href="<?= Url::to(['site/free-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/free.png"></a></p>
                    </div>
                    <div class="col desc">
                        <p>На сайте вы можете найти и <?= Html::a('<strong>бесплатно скачать</strong>', Url::to(['site/free-section'])) ?> базы данных для вашего проекта.</p>
                        <p>Все данные получены из открытых источников и предоставляются по принципу <a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BA_%D0%B5%D1%81%D1%82%D1%8C" target="_blank"><strong>«Как есть»</strong></a>.</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-success">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/free-section']) ?>" class="btn btn btn-success btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Посмотреть каталог</a></p>
            </div>
        </div>
    </div>
    <div class="col mb-3">
        <div class="card border-warning h-100">
            <h4 class="card-header bg-warning">Заказать базу данных</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <p class="mb-4"><a href="<?= Url::to(['site/order']) ?>"><img src="<?= Yii::getAlias('@img') ?>/order.png"></a></p>
                    </div>
                    <div class="col desc">
                        <p>Если вы не нашли у нас нужную информацию или вас не устраивает формат данных, то вы можете <?= Html::a('<strong>заказать разработку</strong>', Url::to(['site/order'])) ?> базы данных под ваши требования.</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-warning">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/order']) ?>" class="btn btn btn-warning btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Заказать</a></p>
            </div>
        </div>
    </div>
    <div class="col mb-3">
        <div class="card border-primary h-100">
            <h4 class="card-header bg-primary">Платные базы данных</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <p class="mb-4"><a href="<?= Url::to(['site/paid-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/paid.png"></a></p>
                    </div>
                    <div class="col desc">
                        <p>Доступ к ряду баз данных предоставляется на <?= Html::a('<strong>платной основе</strong>', Url::to(['site/paid-section'])) ?> и содержит более расширенную информацию, по сравнению с бесплатными аналогами.</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-primary">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/paid-section']) ?>" class="btn btn btn-primary btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Посмотреть каталог</a></p>
            </div>
        </div>
    </div>
</div>
<?php /*
<div class="card-deck row-cols-lg-2" id="index-page">
        <div class="card border-success mb-4 mt-4">
            <h5 class="card-header bg-success">Бесплатные базы данных</h5>
            <div class="card-body">
                <p><a href="<?= Url::to(['site/free-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/free.png"></a></p>
                <p class="desc">На сайте вы можете найти и <?= Html::a('<strong>бесплатно скачать</strong>', Url::to(['site/free-section'])) ?> данные для вашего проекта.</p>
            </div>
            <div class="card-footer bg-transparent border-success">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/free-section']) ?>" class="btn btn btn-success btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Посмотреть каталог</a></p>
            </div>
        </div>
        <div class="card border-warning mb-4 mt-4">
            <h5 class="card-header bg-warning">Заказать базу данных</h5>
            <div class="card-body">
                <p><a href="<?= Url::to(['site/order']) ?>"><img src="<?= Yii::getAlias('@img') ?>/order.png"></a></p>
                <p class="desc">Если вы не нашли у нас нужную информацию или вас не устраивает формат данных, то вы можете <?= Html::a('<strong>заказать разработку</strong>', Url::to(['site/order'])) ?> базы данных под ваши требования.</p>
            </div>
            <div class="card-footer bg-transparent border-warning">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/order']) ?>" class="btn btn btn-warning btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Заказать</a></p>
            </div>
        </div>
        <div class="card border-primary mb-4 mt-4">
            <h5 class="card-header bg-primary">Платные базы данных</h5>
            <div class="card-body">
                <p><a href="<?= Url::to(['site/paid-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/paid.png"></a></p>
                <p class="desc">Доступ к ряду баз данных предоставляется на <?= Html::a('<strong>платной основе</strong>', Url::to(['site/paid-section'])) ?> и содержит более расширенную информацию, по сравнению с бесплатными аналогами.</p>
            </div>
            <div class="card-footer bg-transparent border-primary">
                <p class="mt-1 mb-1"><a href="<?= Url::to(['site/paid-section']) ?>" class="btn btn btn-primary btn-lg w-100" tabindex="-1" role="button" aria-disabled="true">Посмотреть каталог</a></p>
            </div>
        </div>
</div>
<?php /*
<div class="row">
    <div class="col">
        <div id="desc" class="text-center bg-white rounded shadow mt-4 mb-4 ml-4 mr-4 p-3">
            <p>На сайте вы можете найти и <?= Html::a('<strong>бесплатно скачать</strong>', Url::to(['site/free-section'])) ?> данные для вашего проекта.</p>
            <p>Если вы не нашли у нас нужную информацию или вас не устраивает формат данных, то вы можете <?= Html::a('<strong>заказать разработку</strong>', Url::to(['site/order'])) ?> базы данных под ваши требования.</p>
            <p>Доступ к ряду баз данных предоставляется на <?= Html::a('<strong>платной основе</strong>', Url::to(['site/paid-section'])) ?> и содержит более расширенную информацию, по сравнению с бесплатными аналогами.</p>
        </div>
        <div class="row">
            <div id="free" class="col-lg-4 col-md-6 col-sm-12">
                <div class="row" >
                    <div class="col text-center bg-white rounded shadow mr-5 ml-5 mb-3 pt-3">
                        <p><a href="<?= Url::to(['site/free-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/free.png"></a></p>
                        <p><a href="<?= Url::to(['site/free-section']) ?>" class="btn btn btn-success btn-lg" tabindex="-1" role="button" aria-disabled="true">Бесплатные базы данных</a></p>
                    </div>
                </div>
            </div>
            <div id="order" class="col-lg-4 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col text-center bg-white rounded shadow mr-5 ml-5 mb-3 pt-3">
                        <p><a href="<?= Url::to(['site/order']) ?>"><img src="<?= Yii::getAlias('@img') ?>/order.png"></a></p>
                        <p><a href="<?= Url::to(['site/order']) ?>" class="btn btn btn-warning btn-lg" tabindex="-1" role="button" aria-disabled="true">Заказать базу данных</a></p>
                    </div>
                </div>
            </div>
            <div id="paid" class="col-lg-4 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col text-center bg-white rounded shadow mr-5 ml-5 mb-3 pt-3">
                        <p><a href="<?= Url::to(['site/paid-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/paid.png"></a></p>
                        <p><a href="<?= Url::to(['site/paid-section']) ?>" class="btn btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="true">Платные базы данных</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
*/ ?>