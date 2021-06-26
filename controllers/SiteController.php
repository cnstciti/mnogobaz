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
use app\models\BuyForm;

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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmails();
            $submit = true;
        }

        return $this->render('order', [
            'model' => $model,
            'submit' => $submit,
        ]);
    }

    // Всплывшее модальное окно заполняем представлением signup.php формы с полями
    public function actionBuy()
    {
        $model = new BuyForm();
        $db = (new PaidDb)->getDB(Yii::$app->request->get('dbid'));

        return $this->renderPartial('_modal_buy', [
            'model' => $model,
            'db' => $db,
        ]);
    }

    // По нажатию в модальном окне на Отправить - форма отправляется администратору на почту
    public function actionSubmitbuy()
    {
        $model = new BuyForm();
        $model->load(Yii::$app->request->post());
        $db = (new PaidDb)->getDB(Yii::$app->request->post('dbid'));

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmails($db);
            $success = true;

            return json_encode($success);
        }

        return $this->renderPartial('_modal_buy', [
            'model' => $model,
            'db' => $db,
        ]);
    }

}
