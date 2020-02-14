<?php

namespace app\controllers;

use Yii;
use app\models\Medical;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Image;
use app\models\Pet;
use yii\web\UploadedFile;

/**
 * MedicalController implements the CRUD actions for Medical model.
 */
class MedicalController extends Controller
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
     * Lists all Medical models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays a single Medical model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     *
     *
     */
    public function actionMedical($id)
    {
        $medical = new Medical();
        $pet = Pet::findOne($id);

        $petId = $pet['id'];
        if ($medical->load(Yii::$app->request->post()) && $medical->save()) {
            $medical->image = UploadedFile::getInstance($medical, 'image');
            if($medical->image){
                $medical->upload();
            }
            $medical->gallery = UploadedFile::getInstances($medical, 'gallery');
            $medical->uploadGallery();
            return $this->redirect(['pet/view', 'id' => $petId]);
        }

        return $this->render('create', [
            'petId' => $petId,
            'medical' => $medical,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Medical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Medical();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Medical model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Medical model.
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
     * Finds the Medical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Medical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Medical::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
