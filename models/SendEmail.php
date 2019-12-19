<?php

namespace app\models;
use Yii;
use yii\base\Model;

class SendEmail extends Model	{

	//Уведолмление админку об ошибке 
	public function fromHome($msg)	{
		Yii::$app->mailer->compose('from-home', ['msg' => $msg])
			->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
			->setTo(Yii::$app->params['adminEmail'])
			->setSubject('Сообщение с главной страницы')
			->send();
		return true;
	}
	
	
	
	
}