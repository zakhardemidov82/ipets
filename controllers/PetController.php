<?php

namespace app\controllers;

use app\models\Owner;
use app\models\PetExhibition;
use Yii;
use app\models\Pet;
use app\models\PetName;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Diploma;
use app\models\Image;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;

/**
 * PetController implements the CRUD actions for Pet model.
 */
class PetController extends Controller
{
    /*public $layout = 'admin';*/

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
    public function actionIndex($clubId)
    {
        /*if (!Yii::$app->user->can('viewSuperAdminPage')) {
            throw new ForbiddenHttpException('Доступ заборонено');
        }*/
        $pets = Pet::find()->where(['clubId' => $clubId])->asArray()->all();
        $query = Pet::find()->where(['clubId' => $clubId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'pets' => $pets,
            'clubId' => $clubId,
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
        $clubId = $model['clubId'];
        $nameId = $model->nameId;
        $ownerId = $model['ownerId'];
        $owner = Owner::findOne($ownerId);
        $petname = PetName::find()->where(['id' => $nameId])->asArray()->all();
        foreach ($petname as $item){
            $name = $item['name'];
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
            'name' => $name,
            'images' => $images,
            'owner' => $owner,
            'clubId' => $clubId,
        ]);
    }

    /**
     * Creates a new Pet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreateName($id, $clubId){
        $model = new PetName();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $model->id, 'clubId' => $clubId]);
        }
        return $this->render('create_name', [
            'model' => $model,
            'id' => $id,
            'clubId' => $clubId,
        ]);
    }

    public function actionCreate($id, $clubId)
    {
        $model = new Pet();
        /*$diplom = new Diploma();
        $fotoname = new Image();*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();

            Yii::$app->session->setFlash('success', "Профиль создан");
            return $this->redirect(['view', 'id' => $model->id, 'clubId' => $clubId]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
            'clubId' => $clubId,
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
        $clubId = $model['clubId'];
        $nameId = $model->nameId;
        $petname = PetName::find()->where(['id' => $nameId])->asArray()->all();
        foreach ($petname as $item){
            $name = $item['name'];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){
                $model->upload();
            }
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $model->uploadGallery();

            return $this->redirect(['view', 'id' => $model->id, 'clubId' => $clubId]);
        }

        return $this->render('update', [
            'model' => $model,
            'id' => $id,
            'name' => $name,
            'nameId' => $nameId,
            'clubId' => $clubId,
        ]);
    }


    public function actionDelete($id)
    {
            $model = Pet::findOne($id);
            $clubId = $model['clubId'];
            $idName = PetName::findOne($model['nameId'])->delete();
            $model->delete();

            return $this->redirect(['pet/index', 'clubId' => $clubId]);
        }

    public function actionDeleteEx($id,$exid)
    {

        $model = Pet::findOne($id);
        $idEx = PetExhibition::find()->where(['petId' => $model['nameId'], 'exhibitionId' => $exid])->all();
        foreach ($idEx as $item){
            $item->delete();
        }
        return $this->redirect(['exhibitions/view', 'id' => $exid]);
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
