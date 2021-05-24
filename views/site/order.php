<?php

/* @var $this yii\web\View
 * @var $model app\models\OrderForm
 * @var $submit bool
 *
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$title = 'Заказать базу данных';
$this->title = $title . ' :: Много Баз';;

$this->params['breadcrumbs'][] = $title;

?>
<div class="row" id="order-detail">
    <div class="col bg-white rounded shadow mr-5 ml-5 mb-3 pt-3 pr-3 pl-3">
        <div class="row mb-3">
            <div class="col-auto">
                <img src="/img/order.png">
            </div>
            <div class="col">
                <h1><?= $title ?></h1>
                <div class="row">
                    <div class="col-lg-4">
                        <p class="title">Если вам необходимо</p>
                        <div class="row">
                            <div class="col block rounded shadow mr-3 ml-3 mb-4 pl-1 pr-2 pt-3">
                                <ul>
                                    <li>Создать новую базу данных</li>
                                    <li>Дополнить или удалить данные</li>
                                    <li>Провести нормализацию данных</li>
                                    <li>Сгенерировать фейковые данные</li>
                                    <li>Организовать обезличивание данных</li>
                                    <li>Создать парсер данных</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p class="title">Заполните заявку</p>
                        <div class="row">
                            <div class="col block rounded shadow mr-3 ml-3 mb-4 pl-3 pr-3 pt-3">

                            <? if (!$submit): ?>

                                <?php $form = ActiveForm::begin(); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Имя контактного лица']) ?>

                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email контактного лица']) ?>

                                <?= $form->field($model, 'task')->textarea(['rows' => 4, 'placeholder' => 'Необходимо сделать ...']) ?>

                                <div class="form-group text-right">

                                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

                                </div>

                                <?php ActiveForm::end(); ?>

                            <? else: ?>

                                <p>Ваша заявка успешно отправлена.</p>

                            <? endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p class="title">Мы ответим вам</p>
                        <div class="row">
                            <div class="col block rounded shadow mr-3 ml-3 mb-4 pl-3 pr-3 pt-3">
                                <p>Мы ответим на вашу заявку в течение 24 часов.</p>
                                <div id="condition">
                                    <p>Предварительные условия выполнения работ:</p>
                                    <ul>
                                        <li>Предоплата 30%</li>
                                        <li>По желанию, заключается договор с физическим лицом на оказание услуг и +13% к сумме договора</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
