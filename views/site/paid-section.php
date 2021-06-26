<?php

/* @var $this yii\web\View
 * @var $sections array
 */

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\icons\Icon;

$title = 'Платные базы данных';
$this->title = $title . ' :: Много Баз';

$this->params['breadcrumbs'][] = $title;
Icon::map($this, 'fa');
?>
<div class="row row-cols-1 row-cols-lg-1 mt-2 mr-3 ml-3" id="paid-sections">
    <div class="col mb-3">
        <div class="card border-primary h-100">
            <h4 class="card-header bg-primary"><?= $title ?></h4>
            <div class="card-body">
                <div class="row" id="header">
                    <div class="col-auto">
                        <img src="<?= Yii::getAlias('@img') ?>/paid.png">
                    </div>
                    <div class="col">
                        <p>Для вашего удобства базы данных разбиты по категориям.</p>
                        <p>Каждая категория содержит близкие по тематике данные.</p>
                    </div>
                </div>
                <div class="row">

                    <? foreach ($sections as $section): ?>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col section rounded mr-3 ml-3 mt-4 pb-2">
                                    <div class="row">
                                        <div class="col-auto img text-right">

                                            <?= Icon::show($section['icon']['name'], $section['icon']['options'], $section['icon']['framework']); ?>

                                        </div>
                                        <div class="col">
                                            <h4><?= $section['name'] ?></h4>
                                            <p><?= $section['desc'] ?></p>
                                            <p>Баз данных: <?= $section['count'] ?></p>
                                            <p>
                                                <?= Html::a('Смотреть', Url::to(['site/paid-list', 'link' => $section['link']]), ['class' => "btn btn btn-primary mt-2"]) ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <? endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<? /*
<div class="row row-cols-1 row-cols-lg-1 mt-2 mr-3 ml-3" id="paid-sections">
    <div class="col mb-3">
        <div class="card border-primary h-100">
            <h4 class="card-header bg-primary"><?= $title ?></h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <p class="mb-4"><img src="<?= Yii::getAlias('@img') ?>/paid.png"></p>
                    </div>
                    <div class="col desc">
                        <p>Для вашего удобства базы данных разбиты по категориям.</p>
                        <p>Каждая категория содержит близкие по тематике данные.</p>
                    </div>
                </div>
                <div class="row">

                    <? foreach ($sections as $section): ?>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col section rounded mr-3 ml-3 mt-3 pb-2">
                                    <p>
                                        <?= Html::a($section['name'], Url::to(['site/paid-list', 'link' => $section['link']])) . '<span>(' . $section['count'] . ')</span>' ?>
                                    </p>
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
    </div>
</div>
<?php /*
<div class="row" id="paid-sections">
    <div class="col bg-white rounded shadow mr-5 ml-5 mb-3 pt-3 pr-3 pl-3">
        <div class="row mb-3">
            <div class="col-auto">
                <img src="<?= Yii::getAlias('@img') ?>/paid.png">
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
                            <?= Html::a($section['name'], Url::to(['site/paid-list', 'link' => $section['link']])) . ' <span>(' . $section['count'] . ')</span>'?>
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
*/ ?>