<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pets-view">

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
            /*'id',*/
            'breedId',
            'name',
            'colorId',
            'ownerId',
            'dob',
            'genderId',
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
