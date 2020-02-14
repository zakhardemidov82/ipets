<?php

namespace app\controllers;
use app\models\Diploma;
use Yii;
use app\models\Pet;
use app\models\PetName;
use app\models\Image;
use yii\web\UploadedFile;


class DiplomaController extends \yii\web\Controller
{
    public $layout = 'admin';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionDiplom($id)
    {
        $diplom = new Diploma();
        $pet = Pet::findOne($id);

        $petId = $pet['id'];
        if ($diplom->load(Yii::$app->request->post()) && $diplom->save()) {
            $diplom->image = UploadedFile::getInstance($diplom, 'image');
            if($diplom->image){
                $diplom->upload();
            }
            $diplom->gallery = UploadedFile::getInstances($diplom, 'gallery');
            $diplom->uploadGallery();
            return $this->redirect(['pet/view', 'id' => $petId]);
        }

        return $this->render('create', [
            'petId' => $petId,
            'diplom' => $diplom,
        ]);
    }

    public function actionDiplomView($id)
    {
        $petIdes = Diploma::find()->where(['petId' => $id])->asArray()->all();
        $pet = Pet::findOne($id);
        $nameId = PetName::findOne($pet['nameId']);
        $name = $nameId['name'];
        return $this->render('alldiploms', [
            'petIdes' => $petIdes,
            'name' => $name,
        ]);
    }

   

   // Экшен по скачиванию файла с сайта
    public function actionDownload($id) {
        $images = Image::find()->where(['itemId' =>$id])->asArray()->all();
        foreach ($images as $image) {
            $path = ('upload/store');
            $file = $path . "/" . $image['filePath'];
        }

        if (file_exists($file)) {
            return \Yii::$app->response->sendFile($file);
        }
        throw new \Exception('File not found');
    }
}
