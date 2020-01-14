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
    public $layout = 'admin';

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

    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Owner::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
        ]);
    }

    /**
     * Creates a new Owner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
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
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }
            unset($model->image);//удаляет оригиналы фотографий, чтоб не засорять память

            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
}
