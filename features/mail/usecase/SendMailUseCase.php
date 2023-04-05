<?php

namespace app\features\mail\usecase;

use Yii;


class SendMailUseCase
{
    const SEND_EMAIL = 'nozdryakovtema0603@gmail.com';
    public string $setFrom;
    public string $setSubject;
    public string $setTextBody;
    public function execute(string $setFrom, string $setSubject, string $setTextBody): bool
    {
        try{
            Yii::$app->mailer->compose()
            ->setTo(self::SEND_EMAIL)
            ->setFrom($setFrom)
            ->setSubject($setSubject)
            ->setTextBody($setTextBody)
            ->send();

            return true;

            }catch (\ErrorException $e){
                return false;
            }

    }
}