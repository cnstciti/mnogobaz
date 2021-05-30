<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * OrderForm is the model behind the order form.
 */
class OrderForm extends Model
{
    public $name;
    public $email;
    public $task;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Введите контактное лицо'],
            ['email', 'required', 'message' => 'Введите email'],
            ['task', 'required', 'message' => 'Введите текст заявки'],
            // email has to be a valid email address
            ['email', 'email'],
            ['email', 'unique']
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Контактное лицо',
            'email' => 'Email',
            'task' => 'Текст заявки',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function sendEmails(string $emailAdmin)
    {
        $body = 'Контактное лицо: ' . $this->name . '<br><br>';
        $body .= 'Email: ' . $this->email . '<br><br>';
        $body .= 'Текст заявки: ' . $this->task;
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
//            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setTo('cnst@mail.ru')
//            ->setTo($emailAdmin)
//            ->setReplyTo([$this->email => $this->name])
            ->setSubject('Подана заявка на разработку базы данных')
            ->setTextBody($body)
            ->send();

        $body = $this->name . ', Вы подали заявку на создание базы данных.<br><br>';
        $body .= 'Текст заявки: ' . $this->task . '<br>';
        $body .= 'Мы ответим Вам в течение 24 часов.';
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
//            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setTo($this->email)
//            ->setReplyTo([$this->email => $this->name])
            ->setSubject('Заявка на разработку базы данных')
            ->setTextBody($body)
            ->send();

        return true;
    }
}
