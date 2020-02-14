<?php
/**
 * Created by PhpStorm.
 * User: Захареус
 * Date: 12.02.2020
 * Time: 12:44
 */

namespace app\controllers;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;

class CreatorController  extends Controller
{
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

    public function actionCreateModerator(){

        //var_dump(Yii::$app->request->post()); die;

        if (!Yii::$app->user->can('administration')) {
            throw new ForbiddenHttpException('Access denied');
        }

        $people = new People();

        $university = University::find()->select(['name', 'id'])->indexBy('id')->column();

        //$leader_investigator = People::find()->where(['position_id' => 2])->select(['last_name', 'user_id'])->indexBy('user_id')->column();
        $leader_investigator_raw = People::find()->where(['position_id' => 2])->select(['last_name', 'first_name', 'middle_name', 'user_id'])->asArray()->all();
        $leader_investigator = [];

        for($i = 0; $i < count($leader_investigator_raw); $i++){
            $leader_investigator[$leader_investigator_raw[$i]['user_id']] = $leader_investigator_raw[$i]['last_name'].' '.mb_strimwidth($leader_investigator_raw[$i]['first_name'], 0, 2, '.').' '.mb_strimwidth($leader_investigator_raw[$i]['middle_name'], 0, 2, '.');
        }

        if(Yii::$app->request->post()){

            $users_check = Users::find()
                ->where(['username' => Yii::$app->request->post('login')])
                ->one();

            $people_check = People::find()
                ->where(['email' => Yii::$app->request->post('People')['email']])
                ->one();

            if($users_check != null || $people_check != null){

                $err = 'Увага!!! Користувач з таким <span class="create_many_investigators_no_save_warn_login_mail">email</span> чі <span class="create_many_investigators_no_save_warn_login_mail">login</span> вже є в системі.';
                return $this->render('create_investigator', [
                    'people' => $people,
                    'leader_investigator' => $leader_investigator,
                    'university' => $university,
                    'err' => $err,
                ]);

            } else {

                if($people->load(Yii::$app->request->post())){

                    $users = new Users();
                    $users->username = Yii::$app->request->post('login');
                    $users->password = Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->request->post('password'));
                    $users->auth_key = 0;
                    $users->accessToken = 'investigator';
                    $users->save();

                    $department = People::find()->select(['department_id'])->where(['user_id' => Yii::$app->request->post('People')['id_leader']])->one();
                    $people->user_id = $users->id;
                    $people->department_id = $department->department_id;
                    $people->position_id = 3;

                    $authManager = Yii::$app->authManager;
                    $investigator = $authManager->getRole('investigator');
                    $authManager->assign($investigator, $users->id);

                    $people->save();

                    return $this->redirect(['investigator_one_group', 'id' => $people->i_group, 'add_id' => $people->id]);
                }
            }
        }

        return $this->render('create_investigator', [
            'people' => $people,
            'leader_investigator' => $leader_investigator,
            'university' => $university,
        ]);
    }
}