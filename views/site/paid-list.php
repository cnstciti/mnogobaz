<?php

/* @var $this yii\web\View
 * @var $sectionName string
 * @var $dataBases array
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\web\View;

$this->title = $sectionName . ' :: Много Баз';

$this->params['breadcrumbs'][] = [
    'label' => 'Платные базы данных',
    'url' => ['site/paid-section'],
];
$this->params['breadcrumbs'][] = $sectionName;

?>
<div class="row row-cols-1 row-cols-lg-1 mt-2 mr-3 ml-3" id="paid-list">
    <div class="col mb-3">
        <div class="card border-primary h-100 pb-2">
            <h4 class="card-header bg-primary"><?= $sectionName ?></h4>
            <div class="card-body">
                <div class="row" id="header">
                    <div class="col-auto">
                        <img src="<?= Yii::getAlias('@img') ?>/paid.png">
                    </div>
                    <div class="col">
                        <p>Перед покупкой базы данных вы можете скачать демонстрационную версию, которая отличается от полной версии только набором данных.</p>
                        <p>Для оформления покупки укажите свой email, на который придет инструкция по оплате выбранной базы данных.</p>
                        <p>Каждая база данных представляет собой zip-архив, содержащий: скрипты создания таблиц и индексов в MySql, скрипты добавления данных в MySql, набор данных в формате CSV (c описанием структуры данных) и назначение базы данных.</p>
                    </div>
                </div>
                <div class="row">

                    <? foreach ($dataBases as $db): ?>

                        <div class="col-lg-6 mt-3">
                            <div class="card border-primary h-100 db">
                                <h5 class="card-header bg-primary"><?= $db['name'] ?></h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-8 cost pl-3">
                                            Стоимость: <span><?= $db['cost'] ?></span> рублей.
                                        </div>
                                        <div class="col-sm-12 col-md-4 text-md-right mb-3">

                                            <? /*<a class="btn btn-danger signup" data-target="<?= Url::to(['site/buy']) ?>"> */ ?>
                                            <a class="btn btn-danger buy w-100" data-dbid="<?= $db['id'] ?>">Купить</a>

                                            <?php /*
                                            Modal::begin([
                                                'title' => '<h3>Купить базу данных</h3>',
                                                'toggleButton' => [
                                                    'label' => 'Купить',
                                                    'tag' => 'button',
                                                    'class' => 'btn btn-danger',
                                                ],
                                                //'footer' => 'Низ окна',
                                            ]);
                                            ?>
                                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                            <? /*= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                            <?= $form->field($model, 'email') ?>

                                            <?= $form->field($model, 'subject') ?>

                                            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                            ])* / ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                            </div>

                                            <?php ActiveForm::end(); ?>

                                            <?php Modal::end(); ?>

                                            <? /*= Html::submitButton('Купить', ['class' => 'btn btn-danger buy'])*/ ?>
                                            <? /*= Html::a(
                                            'Купить',
                                            '#',
                                                [
                                                    'data-pjax'   => 0,
                                                    'class'       => 'btn btn-danger buy',
                                                    'data-target' => Url::to(['site/advertising', 'id' => $objectId, 'aid' => $item['uid'], 'price' => $priceName]),
                                                ]
                                            );*/
                                            ?>
                                        </div>
                                    </div>

                                    <?php /*$form = ActiveForm::begin([
                                        'enableClientValidation' => false,
                                        'action' => Url::to(['site/order-paid', 'id' => $key]),
                                    ]);* / ?>

                                    <div class="row buy mb-4">
                                        <div class="col-6">
                                            <input type="text" name="email" class="w-100" placeholder="Email">
                                        </div>
                                        <div class="col-1">

                                            <?= Html::submitButton('Купить', ['class' => 'btn btn-danger']) ?>

                                        </div>
                                    </div>

                                    <?php /*ActiveForm::end(); */?>

                                    <p><?= $db['desc'] ?></p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="<?= Url::to(['site/download', 'file' => $db['file']]) ?>" class="btn btn-primary btn-md" tabindex="-1" role="button" aria-disabled="true">Скачать демо-версию</a>  <span>(<?= $db['sizeFile'] ?>)</span>
                                </div>
                            </div>
                        </div>

                    <? endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'title' => 'Купить базу данных',
    'id'    => 'buy-modal',
    'size'  => 'modal-md',
]);
?>

<div id="modal-body">
    ...
</div>

<?php Modal::end(); ?>

<script type="text/javascript">
    var urlBuy = "<?= Url::to(['site/buy']) ?>";
    var urlSubmitbuy = "<?= Url::to(['site/submitbuy']) ?>";
</script>

<?php
$js = <<< JS
$(document).ready(function () {

    $('.buy').click(function(event){ // нажатие на кнопку - выпадает модальное окно
        event.preventDefault();

        var clickedbtn = $(this);
        var dbID = clickedbtn.data("dbid");

        var modalContainer = $('#buy-modal');
        /*var modalBody = modalContainer.find('.modal-body');*/
        modalContainer.modal({show:true});
        $.ajax({
            url: urlBuy,
            type: "GET",
            data: {'dbid':dbID},
            success: function (data) {
                $('.modal-body').html(data);
                modalContainer.modal({show:true});
            }
        });
    });
    $(document).on('submit', '.buy-form', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: urlSubmitbuy,
            type: "POST",
            data: form.serialize(),
            success: function (result) {
                console.log(result);
                var modalContainer = $('#buy-modal');
                var modalBody = modalContainer.find('.modal-body');
                var insidemodalBody = modalContainer.find('.gb-user-form');
    
                if (result == 'true') {
                    insidemodalBody.html(result).hide(); //
                    //$('#buy-modal').modal('hide');
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').append("<strong>Спасибо! <div>На указанный вами email отправлено сообщение с инструкциями по покупке базы данных.</div></strong>");
                    $('#success > .alert-success').append('</div>');
    
                    setTimeout(function() { // скрываем modal через 15 секунды
                        $("#buy-modal").modal('hide');
                    }, 15000);
                }
                else {
                    modalBody.html(result).hide().fadeIn();
                }
            }
        });
    });
});
JS;

$this->registerJs($js, View::POS_END);
 /*
$this->registerJsFile(
    'js/buy.js',
    ['depends'=>'app\assets\AppAsset']
);
 */
?>

<?php /*
<div class="row" id="paid-list">
    <div class="col bg-white rounded shadow mr-5 ml-5 mb-3 pt-3 pr-3 pl-3">
        <div class="row mb-3">
            <div class="col-auto">
                <img src="<?= Yii::getAlias('@img') ?>/paid.png">
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
                        <div class="title pl-2">
                            <?= $db['name'] ?>
                        </div>
                        <p class="desc">
                            <?= $db['desc'] ?>
                        </p>
                        <p class="download">
                            <a href="<?= Url::to(['site/download', 'file' => $db['file']]) ?>" class="btn btn-success btn-md" tabindex="-1" role="button" aria-disabled="true">Скачать демо-версию</a>  <span>(<?= $db['sizeFile'] ?>)</    span>
                        </p>
                    </div>
                </div>
            </div>

        <? endforeach; ?>

        </div>
    </div>
</div>
*/ ?>