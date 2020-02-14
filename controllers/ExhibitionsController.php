<?php

namespace app\controllers;

use Yii;
use app\models\Exhibitions;
use app\models\PetExhibition;
use app\models\Pet;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExhibitionsController implements the CRUD actions for Exhibitions model.
 */
class ExhibitionsController extends Controller
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
     * Lists all Exhibitions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Exhibitions::find(),
        ]);

        /* $Exhibitions = new ExhibitionsSearch();
         $Exhibitions = $Exhibitions->search(Yii::$app->request->queryParams);
         $Exhibitions->pagination = ['pageSize' => false];*/

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            /* 'Exhibitions' => $Exhibitions,*/
        ]);
    }

    /**
     * Displays a single Exhibitions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Exhibitions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exhibitions();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateList($id)
    {
        $model = new PetExhibition();

        /* if(!isset($petId)){*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['exhibitions/view', 'id' => $id]);
        }/*}else{
            echo '<script language="javascript">';
            echo 'alert("Ця собака вже є у списку!")';
            echo '</script>';
            return $this->redirect(['exhibitions/view', 'id' => $id]);
        }*/

        return $this->render('create_list', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing Exhibitions model.
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

    public function actionReport($id)
    {
        $model = Exhibitions::findOne($id);

        $pets = PetExhibition::find()->where(['exhibitionId' => $id])->all();

        return $this->render('report', [
            'model' => $model,
            'pets' => $pets,
        ]);
    }

    /**
     * Deletes an existing Exhibitions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model = Exhibitions::findOne($id);

        $idExhibition = PetExhibition::find()->where(['exhibitionId'=> $id])->all();
        foreach ($idExhibition as $item){
            $item->delete();
        }
        $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Exhibitions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exhibitions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exhibitions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
