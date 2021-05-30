<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\OrderForm;
use app\models\FreeSection;
use app\models\FreeDb;
use app\models\PaidSection;
use app\models\PaidDb;


use app\models\ar\CarCharacteristicGroupAR;
use app\models\ar\CarCharacteristicItemAR;
use app\models\ar\CarCharacteristicValueAR;
use app\models\ar\CarModificationAR;
use app\models\ar\UnitAR;
use app\models\ar\ValueAR;
use app\models\ar\NewCharacteristicValueAR;
use app\models\ar\NewCharValAR;


use yii\helpers\Json;

class SiteController extends Controller
{
    /* ---- */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFreeSection()
    {
        $sections = (new FreeSection)->getList();

        return $this->render('free-section', [
            'sections' => $sections,
        ]);
    }

    public function actionFreeList()
    {
        $link = Yii::$app->request->get('link');
        $section = (new FreeSection)->getSectionByLink($link);
        if ($link == 'all-db') {
            $dataBases = (new FreeDb)->getListAll();
        } else {
            $dataBases = (new FreeDb)->getList($section['key']);
        }

        return $this->render('free-list', [
            'sectionName' => $section['name'],
            'dataBases' => $dataBases,
        ]);
    }

    public function actionPaidSection()
    {
        $sections = (new PaidSection)->getList();

        return $this->render('paid-section', [
            'sections' => $sections,
        ]);
    }

    public function actionPaidList()
    {
        $link = Yii::$app->request->get('link');
        $section = (new PaidSection)->getSectionByLink($link);
        if ($link == 'all-db') {
            $dataBases = (new PaidDb)->getListAll();
        } else {
            $dataBases = (new PaidDb)->getList($section['key']);
        }

        return $this->render('paid-list', [
            'sectionName' => $section['name'],
            'dataBases' => $dataBases,
        ]);
    }

    public function actionDownload() {
        $file = Yii::getAlias('@arch') . '/' . Yii::$app->request->get('file');

        if (file_exists($file)) {
            return Yii::$app->response->sendFile($file);
        }
        throw new \Exception('File not found');
    }

    public function actionOrder()
    {
        $submit = false;
        $model = new OrderForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendEmails(
                /*Yii::$app->params['adminEmail']*/
            )) {
                $submit = true;
            }
        }

        return $this->render('order', [
            'model' => $model,
            'submit' => $submit,
        ]);
    }

    public function actionCar()
    {
        $characteristicS = CarCharacteristicValueAR::find()
            ->where(['is_del' => 0])
            ->limit(5000)
            ->all();
        foreach ($characteristicS as $characteristicValue) {
            // ищем в справочние Value
            $value = ValueAR::find()->where(['name' => $characteristicValue->value])->one();
            if (empty($value)) {
                // если value не нашли, то добавляем в справочник
                $row = new ValueAR;
                $row->name = $characteristicValue->value;
                $row->save();
                $valueId = Yii::$app->db->getLastInsertID();
            } else {
                $valueId = $value->id;
            }

            // ищем в справочние Unit
            if ($characteristicValue->unit == 'см3') {
                $characteristicValue->unit = 'см³';
            }
            $unit = UnitAR::find()->where(['name' => $characteristicValue->unit])->one();
            if (empty($unit)) {
                if (!empty($characteristicValue->unit)) {
                    // если value не нашли, то добавляем в справочник
                    $row = new UnitAR;
                    $row->name = $characteristicValue->unit;
                    $row->save();
                    $unitId = Yii::$app->db->getLastInsertID();
                } else {
                    $unitId = null;
                }
            } else {
                $unitId = $unit->id;
            }

            // ищем в справочние Modification
            $modification = CarModificationAR::find()->where(['id_car_modification' => $characteristicValue->id_car_modification])->one();
            $modificationId = $modification->id;

            // ищем
            if ($characteristicValue->id_car_characteristic == 64) {
                $id_car_characteristic = 37;
            } else {
                $id_car_characteristic = $characteristicValue->id_car_characteristic;
            }
            $item = CarCharacteristicItemAR::find()->where(['id_car_characteristic' => $id_car_characteristic])->one();
            $itemId = $item->id_new;
            $itemNameEn = $item->name_en;

            // добавляем новую характеристику
            $row = new NewCharacteristicValueAR;
            $row->value = $characteristicValue->value;
            $row->value_id = $valueId;
            $row->unit = $characteristicValue->unit;
            $row->unit_id = $unitId;
            $row->characteristic_item_id = $itemId;
            $row->modification_id = $modificationId;
            $row->save();

            // ищем модификацию в NewCharValAR
            $itemChar = NewCharValAR::find()->where(['modification_id' => $modificationId])->one();
            $fieldValueId = $itemNameEn . '_value_id';
            $fieldUnitId = $itemNameEn . '_unit_id';
            if (empty($itemChar)) {
                // если нет такой модификации
                $row = new NewCharValAR;
                $row->modification_id = $modificationId;
                $row->characteristic_item_id = $itemId;
                $row->$fieldValueId = $valueId;
                $row->$fieldUnitId = $unitId;
                $row->save();
            } else {
                $itemChar->$fieldValueId = $valueId;
                $itemChar->$fieldUnitId = $unitId;
                $itemChar->save();
            }

            $characteristicValue->is_del = 1;
            $characteristicValue->save();
        }
        //CarCharacteristicValueAR::deleteAll();
    }

}
