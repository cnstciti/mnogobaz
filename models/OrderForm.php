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
            [ ['name'], 'string', 'min' => 3, 'tooShort' => 'Имя контактного лица должно быть не менее 3 символов'],
            ['email', 'required', 'message' => 'Введите email'],
            ['task', 'required', 'message' => 'Введите текст заявки'],
            [ ['task'], 'string', 'min' => 10, 'tooShort' => 'Текст заявки должен быть не менее 10 символов'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Не верный формат email'],
            ['email', 'unique'],
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
     */
    public function sendEmails()
    {
        $body = 'Контактное лицо: ' . $this->name . '<br>';
        $body .= 'Email: ' . $this->email . '<br>';
        $body .= 'Текст заявки: ' . $this->task;
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
            ->setTo(Yii::$app->params['myEmail'])
            ->setSubject('Подана заявка на разработку базы данных')
            ->setHtmlBody($body)
            ->send();

        $body = $this->name . ', Вы подали заявку на создание базы данных.<br><br>';
        $body .= 'Текст заявки: ' . $this->task . '<br><br>';
        $body .= 'Мы ответим Вам в течение 24 часов.';
        Yii::$app->mailer->compose()
            ->setFrom([Yii::$app->params['senderEmail']])
            ->setTo($this->email)
            ->setSubject('Заявка на разработку базы данных')
            ->setHtmlBody($body)
            ->send();
    }
}
