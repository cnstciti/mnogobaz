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
                <p>Каждая база данных представляет собой zip-архив, содержащий: набор данных в формате csv, описание структуры данных и назначение базы данных.</p>
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
