<?php

/* @var $this yii\web\View
 * @var $sectionName string
 * @var $dataBases array
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $sectionName . ' :: Много Баз';

$this->params['breadcrumbs'][] = [
    'label' => 'Бесплатные базы данных',
    'url' => ['site/free-section'],
];
$this->params['breadcrumbs'][] = $sectionName;

?>
<div class="row row-cols-1 row-cols-lg-1 mt-2 mr-3 ml-3" id="free-list">
    <div class="col mb-3">
        <div class="card border-success h-100 pb-2">
            <h4 class="card-header bg-success"><?= $sectionName ?></h4>
            <div class="card-body">
                <div class="row" id="header">
                    <div class="col-auto">
                        <img src="<?= Yii::getAlias('@img') ?>/free.png">
                    </div>
                    <div class="col">
                        <p>Все данные получены из открытых источников и предоставляются по принципу <a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BA_%D0%B5%D1%81%D1%82%D1%8C" target="_blank">«Как есть»</a>.</p>
                        <p>Если вам необходимы изменения в базе данных (дополнение, нормализация, удаление данных и т.п.), то вы можете <?= Html::a('заказать разработку', Url::to(['site/order'])) ?> под ваши требования.</p>
                        <p>Каждая база данных представляет собой zip-архив, содержащий: скрипты создания таблиц и индексов в MySql, скрипты добавления данных в MySql, набор данных в формате CSV (c описанием структуры данных) и назначение базы данных.</p>
                    </div>
                </div>
                <div class="row">

                    <? foreach ($dataBases as $db): ?>

                        <div class="col-lg-6 mt-3">
                            <div class="card border-success h-100 db">
                                <h5 class="card-header bg-success"><?= $db['name'] ?></h5>
                                <div class="card-body">
                                    <p><?= $db['desc'] ?></p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="<?= Url::to(['site/download', 'file' => $db['file']]) ?>" class="btn btn-success btn-md" tabindex="-1" role="button" aria-disabled="true">Скачать</a>  <span>(<?= $db['sizeFile'] ?>)</span>
                                </div>
                            </div>
                        </div>
                        <? /*
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col db rounded mr-3 ml-3 mt-3 p-2">
                                    <div class="title pl-2">
                                        <?= $db['name'] ?>
                                    </div>
                                    <p class="desc">
                                        <?= $db['desc'] ?>
                                    </p>
                                    <p class="download">
                                        <a href="<?= Url::to(['site/download', 'file' => $db['file']]) ?>" class="btn btn-success btn-md" tabindex="-1" role="button" aria-disabled="true">Скачать</a>  <span>(<?= $db['sizeFile'] ?>)</    span>
                                    </p>
                                </div>
                            </div>
                        </div>
*/ ?>
                    <? endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<? /*
<div class="row" id="free-list">
    <div class="col bg-white rounded shadow mr-5 ml-5 mb-3 pt-3 pr-3 pl-3">
        <div class="row mb-3">
            <div class="col-auto">
                <img src="<?= Yii::getAlias('@img') ?>/free.png">
            </div>
            <div class="col">
                <h1><?= $sectionName ?></h1>
                <p>Все данные получены из открытых источников и предоставляются по принципу <a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D0%BA_%D0%B5%D1%81%D1%82%D1%8C" target="_blank">«Как есть»</a>.</p>
                <p>Если вам необходимы изменения в базе данных (дополнение, нормализация, удаление данных и т.п.), то вы можете <?= Html::a('заказать разработку', Url::to(['site/order'])) ?> под ваши требования.</p>
                <p>Каждая база данных представляет собой zip-архив, содержащий: скрипты создания таблиц и индексов в MySql, скрипты добавления данных в MySql, набор данных в формате CSV (c описанием структуры данных) и назначение базы данных.</p>
            </div>
        </div>
        <div class="row">

        <? foreach ($dataBases as $db): ?>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col db rounded shadow mr-3 ml-3 mb-4 p-2">
                        <div class="title">
                            <?= $db['name'] ?>
                        </div>
                        <p class="desc">
                            <?= $db['desc'] ?>
                        </p>
                        <p class="download">
                            <a href="<?= Url::to(['site/download', 'file' => $db['file']]) ?>" class="btn btn-success btn-sm" tabindex="-1" role="button" aria-disabled="true">Скачать</a>  <span>(<?= $db['sizeFile'] ?>)</    span>
                        </p>
                    </div>
                </div>
            </div>

        <? endforeach; ?>

        </div>
    </div>
</div>
*/ ?>