<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Много Баз';
?>
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
                        <p><a href="<?= Url::to(['site/order']) ?>" class="btn btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="true">Заказать базу данных</a></p>
                    </div>
                </div>
            </div>
            <div id="paid" class="col-lg-4 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col text-center bg-white rounded shadow mr-5 ml-5 mb-3 pt-3">
                        <p><a href="<?= Url::to(['site/paid-section']) ?>"><img src="<?= Yii::getAlias('@img') ?>/paid.png"></a></p>
                        <p><a href="<?= Url::to(['site/paid-section']) ?>" class="btn btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Платные базы данных</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
