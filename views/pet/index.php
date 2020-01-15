<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Питомцы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?/*= Html::a('Создать карточку питомца', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            /*'id',*/
            'breed',
            'nameId',
            'color',
            /*'ownerId',*/
            //'dob',
            'gender',
            //'pedigree_number',
            //'number_KSU',
            //'number_FCI',
            //'registration_club',
            //'breeding_club',
            //'comments:ntext',
            //'father',
            //'mother',
            //'dignityId',
            //'awardsId',
            //'puppy_card_number',
            //'participation_in_the_exhibition',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
