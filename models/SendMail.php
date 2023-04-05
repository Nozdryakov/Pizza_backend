<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SendMail extends Model
{
    public $name;
    public $phoneNumber;
    public $street;


    public function rules()
    {
        return [
            [['name', 'phoneNumber', 'street'], 'required'],
            // email has to be a valid email address
            ['phoneNumber', 'match', 'patter' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'Введите корректный номер телефона!'],
        ];
    }



    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function SendMail()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('nozdryakovtema0603@gmail.com')
                ->setFrom('VikkiPizza@zov')
                ->setSubject("it's Vikki Pizza, hello")
                ->setTextBody('body text')
                ->send();

            return true;
        }
        return false;
    }
}
