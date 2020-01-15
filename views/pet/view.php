<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Pet', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
use app\models\Image;
?>
<div class="pets-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php foreach($images as $img): ?>
                 <?php if($img['isMain']): ?>
                    <img src="<?=Yii::getAlias('@web')?>/upload/store/<?= $img['filePath']?>" class="main-pet" alt="...">
                 <?php endif;?>
            <?php endforeach;?>
        </div>
        <div class="col-md-6">
        </div>
    </div>

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
            /*'id',*/
            'breed',
            /*'nameId',*/
            'color',
           /* 'ownerId',*/
            'dob',
            'gender',
            'pedigree_number',
            'number_KSU',
            'number_FCI',
            'registration_club',
            'breeding_club',
            'comments:ntext',
            'father',
            'mother',
            'dignityId',
            'awardsId',
            'puppy_card_number',
            'participation_in_the_exhibition',
        ],
    ]) ?>

</div>
