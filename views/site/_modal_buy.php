<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\gbUser $model
 * @var yii\widgets\ActiveForm $form
 * @var array $db
 */
?>

<div id="success"> </div> <!-- For success message -->

<?php $form = ActiveForm::begin(['options' => ['class' => 'buy-form']]); ?>

<div class="gb-user-form">

    <input type="hidden" name="dbid" value="<?= $db['id'] ?>">

    <div class="row">
        <div class="col-4">
            База данных:
        </div>
        <div class="col-8">
            <strong><?= $db['name'] ?></strong>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-4">
            Стоимость:
        </div>
        <div class="col-8 cost">
            <span><?= $db['cost'] ?></span> рублей
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-4 pt-1">
            Email:
        </div>
        <div class="col-8">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 32], ['class' => 'input-modal'])->label(false) ?>
        </div>
    </div>

    <div class="form-group text-right mb-0">

        <?= Html::submitButton('Купить', ['class' => 'btn btn-success btn-md pl-5 pr-5']) ?>

    </div>

</div>

<?php ActiveForm::end(); ?>
