<?php

namespace app\controllers;

use app\models\Owner;
use Yii;
use app\models\Pet;
use app\models\PetName;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Image;
use yii\web\UploadedFile;

/**
 * PetController implements the CRUD actions for Pet model.
 */
class PetController extends Controller
{
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
     * Lists all Pet models.
     * @return mixed
     */
    public function actionIndex()
    {/*
        $pets = Pet::find()->asArray()->all();

        $petname = PetName::find()->asArray()->all();

        return $this->render('index', [
            'pets' => $pets,
            'petname' => $petname,
        ]);*/
        $dataProvider = new ActiveDataProvider([
            'query' => Pet::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $images = Image::find()->where(['itemId' => $id])->all();
        $model = $this->findModel($id);
        $nameId = $model->nameId;
        $petname = PetName::find()->where(['id' => $nameId])->asArray()->all();
        $name = $petname['name'];
        $name = $petname['0'];
        $name = $name['name'];
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
            'name' => $name,
            'images' => $images,
        ]);
    }

    /**
     * Creates a new Pet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreateName($id){
        $model = new PetName();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $model->id]);
        }
        return $this->render('create_name', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionCreate($id)
    {


        $model = new Pet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }

            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();

            Yii::$app->session->setFlash('success', "Профиль создан");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing Pet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $nameId = $model->nameId;
        $petname = PetName::find()->where(['id' => $nameId])->asArray()->all();
        $name = $petname['name'];
        $name = $petname['0'];
        $name = $name['name'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'id' => $id,
            'name' => $name,
        ]);
    }

    /**
     * Deletes an existing Pet model.
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
     * Finds the Pet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
