<?php

namespace app\controllers;

use app\widgets\Alert;
use Yii;
use app\models\Owner;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\PetName;
use app\models\OwnerPet;

/**
 * OwnerController implements the CRUD actions for Owner model.
 */
class OwnerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = false;

    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Owner models.
     * @return mixed
     */
    /*public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can('admin')) {
                throw new ForbiddenHttpException('Доступ заборонено, спочатку пройдіть перевірку на розпізнавання голосу, сканування сітківки ока та відбитків пальців');
            }
            return true;
        } else {
            return false;
        }
    }*/

    public function actionIndex($clubId)
    {
       /* var_dump($clubId);*/
        $query = Owner::find()->where(['clubId' => $clubId]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'clubId' => $clubId,
        ]);
    }

    /**
     * Displays a single Owner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $clubId = $model['clubId'];
        return $this->render('view', [
            'model' => $model,
            'id' => $id,
            'clubId' => $clubId,
        ]);
    }

    /**
     * Creates a new Owner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($clubId)
    {
        $model = new Owner();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }

            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();

            Yii::$app->session->setFlash('success', "Профіль {$model->last_name} додан");
            return $this->redirect(['view', 'id' => $model->id, 'clubId' => $clubId]);
        }

        return $this->render('create', [
            'model' => $model,
            'clubId' => $clubId,
        ]);
    }
   /* public function actionPetName($id)
    {
        $owner = Owner::findOne($id);

        /*$model = new PetName();*/
        /*echo " askjfgjadfhb";*/

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        /*$ownerpet = new OwnerPet();
        $ownerpet->ownerId = $id;
        $ownerpet->petId = $model->id;
        $ownerpet->save();*/

        /*return $this->redirect('petName/create', [
            /*'model' => $model,
            'owner' => $owner,
        ]);
    }*/

    /**
     * Updates an existing Owner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $clubId = $model['clubId'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }
            unset($model->image);//удаляет оригиналы фотографий, чтоб не засорять память

            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();
            return $this->redirect(['view', 'id' => $model->id, 'clubId' => $clubId]);
        }

        return $this->render('update', [
            'model' => $model,
            'clubId' => $clubId,
        ]);
    }

    /**
     * Deletes an existing Owner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $clubId = $model['clubId'];
        $model->delete();

        return $this->redirect(['owner/index', 'clubId' => $clubId]);

    }

    /**
     * Finds the Owner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Owner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Owner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public static function transliterate($string, $transliterator = null)
    {
        if (static::hasIntl()) {
            if ($transliterator === null) {
                $transliterator = static::$transliterator;
            }

            return transliterator_transliterate($transliterator, $string);
        }

        return strtr($string, static::$transliteration);
    }
}
