<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PetName;
use app\models\Pet;
/* @var $this yii\web\View */
/* @var $model app\models\Owner */

$this->title = $model->last_name.' '.$model->first_name.' '.$model->middle_name;
$this->params['breadcrumbs'][] = ['label' => 'Владельцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="owner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить данные', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить карточку', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           /* 'id',*/
            'last_name',
            'first_name',
            'middle_name',
            'adres_index',
            'city',
            'street',
            'house',
            'flat',
            'phone_home',
            'phone_work',
            'email:email',
            'site',
            'date_of_entry',
            'cipher_in_the_breeding_factory',
            'KSU_code',
            'comments:ntext',
        ],
    ]) ?>
    <div class="">
        <?php
        $petnames = PetName::find()->where(['ownerId' => $id])->all();

        /*$pets = Pet::find()->where(['ownerId' => $id])->all();*/
        echo "<p>Список собак, владельцем которых является "." ".$model->last_name.' '.$model->first_name.' '.$model->middle_name."</p>";

        echo "<ul>";
            foreach ( $petnames  as  $petname ){
                echo "<li>";
                        $pets = Pet::find()->where(['nameId' => $petname])->all();
                        foreach ( $pets  as  $pet) {
                            echo "<a href=".\yii\helpers\Url::to(['pet/view', 'id' => $pet['id']]).">".$petname['name']."</a>";
                        }
                echo "</li>";
                    }
        echo "</ul>";
        ?>
    </div>

    <p>
    <?= Html::a('Добавить собаку', ['pet/create-name', 'id' => $model->id],  ['class' => 'btn btn-primary']) ?>
    </p>
</div>
