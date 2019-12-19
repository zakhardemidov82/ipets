<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Владельцы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать карточку владельца', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'last_name',
            'first_name',
            'middle_name',
           // 'adres_index',
            //'city',
            //'street',
            //'house',
            //'flat',
            //'phone_home',
            'phone_work',
            'email:email',
            //'site',
            //'date_of_entry',
            //'cipher_in_the_breeding_factory',
            //'KSU_code',
            //'comments:ntext',
            //'petsId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
