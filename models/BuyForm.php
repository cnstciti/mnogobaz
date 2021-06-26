<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Security;

class BuyForm extends Model
{
    public $email;
    /**
     * Здесь мы указываем правила валидации - они могут быть как стандартными, так и кастомными
     */
    public function rules()
    {
        return [
            [['email'], 'required', 'message' => 'Укажите ваш email'],
            [['email'], 'email', 'message' => 'Не верный формат email'],
            //[['email'], 'validatePhoneEmailEmpty', 'skipOnEmpty'=> false],
        ];
    }
/*
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
        ];
    }

    /* Кастомная функция для проверки, что хотя бы одно из полей email или phone посетитель заполнил * /
    public function validatePhoneEmailEmpty()
    {
        if(empty($this->email))
        {
            $errorMsg = 'Укажите ваш email';
            $this->addError('email',$errorMsg);
        }
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     */
    public function sendEmails(array $db)
    {
        $body = 'База данных: ' . $db['name'] . '<br>';
        $body .= 'Стоимость: ' . $db['cost'] . ' рублей<br>';
        $body .= 'Email заказчика: ' . $this->email . '<br>';
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
            ->setTo(Yii::$app->params['myEmail'])
            ->setSubject('Подана заявка на покупку базы данных')
            ->setHtmlBody($body)
            ->send();

        $body = 'Вы подали заявку на покупку базы данных.<br><br>';
        $body .= 'База данных: "' . $db['name'] . '".<br>';
        $body .= 'Стоимость: ' . $db['cost'] . ' рублей.<br><br>';
        $body .= 'Инструкция по покупке базы данных:<br><br>';
        $body .= '1. В ближайшее время вы получите письмо со ссылкой на скачивание архива c полным набором данных.<br>';
        $body .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;На архив будет установлен пароль, но у вас будет возможность посмотреть количество и объем файлов.<br><br>';
        $body .= '2. После ознакомления с данными из архива вы переводите необходимую сумму на карту Сбербанка.<br>';
        $body .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Номер карты будет указан в письме из п.1.<br><br>';
        $body .= '3. После подтверждения перевода денежных средств вам будет отправлено письмо с паролем от архива.<br>';
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
            ->setTo($this->email)
            ->setSubject('Заявка на покупку базы данных')
            ->setHtmlBody($body)
            ->send();
    }

}
