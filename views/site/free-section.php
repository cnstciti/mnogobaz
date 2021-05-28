<?php

/* @var $this yii\web\View
 * @var $sections array
 */

use yii\helpers\Url;
use yii\helpers\Html;

$title = 'Бесплатные базы данных';
$this->title = $title . ' :: Много Баз';

$this->params['breadcrumbs'][] = $title;

?>
<div class="row" id="free-sections">
    <div class="col bg-white rounded shadow mr-5 ml-5 mb-3 pt-3 pr-3 pl-3">
        <div class="row mb-3">
            <div class="col-auto">
                <img src="img/free.png">
            </div>
            <div class="col">
                <h1><?= $title ?></h1>
                <p>Для вашего удобства базы данных разбиты по категориям.</p>
                <p>Каждая категория содержит близкие по тематике данные.</p>
            </div>
        </div>
        <div class="row">

    <? foreach ($sections as $section): ?>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col section rounded shadow mr-3 ml-3 mb-4 pt-2">
                        <?= Html::a($section['name'], Url::to(['site/free-list', 'link' => $section['link']])) . ' <span>(' . $section['count'] . ')</span>'?>
                        <p class="desc">
                            <?= $section['desc'] ?>
                        </p>
                    </div>
                </div>
            </div>

    <? endforeach; ?>

        </div>
    </div>
</div>
