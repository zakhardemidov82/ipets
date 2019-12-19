<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;
use app\models\Owner;
use app\models\Image;


use app\models\SendEmail;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
    public function actionIndex()    {
		$this->layout = 'front'; 
		return $this->render('index');
    }

	//Отправка сообщения
	public function actionHomeSend()    {
		if (Yii::$app->request->isAjax)	{
			$msg = array (
				'name' =>Yii::$app->request->post()['name'],
				'tel' => Yii::$app->request->post()['tel'],
				'email' => Yii::$app->request->post()['email'],
				'form' => Yii::$app->request->post()['form'],
			);
			if (SendEmail::fromHome($msg))	{return 'ok';}
			else {return 'error';}
		}
		return 'error';
    }
	
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if($model->getUser()->accessToken === '100-token') {
                return $this->redirect(Url::toRoute(['admin/index']));
            }
            if($model->getUser()->accessToken === '101-token') {
                return $this->redirect(Url::toRoute(['pets/index']));
            }
            else {
                return $this->redirect(Url::toRoute(['owner/index']));
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionOwners()
    {
        $this->layout = 'main';

        $owners = Owner::find()->all();
        $images = Image::find()->all();

        return $this->render('owners', [
            'owners' => $owners,
            'images' => $images,
        ]);
    }
}
