<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PetExhibition;
use app\models\Pet;
use app\models\PetName;

/* @var $this yii\web\View */
/* @var $model app\models\Exhibitions */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="exhibitions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Змінити дані', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що бажаєте видалити цю інформацію?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Сформувати звіт', ['exhibitions/report', 'id' => $model->id], ['class' => 'btn btn-report']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'name',
            'name_trans',
            'date',
            'city',
            'city_trans',
            'rang',
        ],
    ]) ?>

    <div class="">
        <?php
        $exId = $model->id;
        $petIdes = PetExhibition::find()->where(['exhibitionId' => $exId])->asArray()->all();
        echo "<p>Список собак, які приймають участь у цій виставці: </p>";
        echo "<ul>";
        foreach ( $petIdes  as  $petId ){
            echo "<li>";
            $petName = PetName::findOne($petId['petId']);
            $pets = Pet::find()->where(['nameId' => $petId])->all();
            foreach ( $pets  as  $pet) {
                echo "<div class=\"col-md-6\"><a href=".\yii\helpers\Url::to(['pet/view', 'id' => $pet['id']]).">".$petName['name']."
                </a></div><a href=".\yii\helpers\Url::to(['pet/delete-ex', 'id' => $pet['id'], 'exid' => $exId])."><img class=\"del\" src=\"\\images/template/del.jpg\"></a>";

            }
            echo "</li>";
            echo "<p></p>";
        }
        echo "</ul>";
        ?>
    </div>

    <p>
        <?= Html::a('Додати собаку', ['exhibitions/create-list', 'id' => $model->id],  ['class' => 'btn btn-primary']) ?>
    </p>

</div>
