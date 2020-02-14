<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\ExhibitionsSearch;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виставки';
?>
<div class="exhibitions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити виставку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

           /* 'id',*/
            'name',
            'name_trans',
            'date',
            'city',
            'city_trans',
            'rang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php /*Pjax::begin();

echo GridView::widget([
'dataProvider' => $dataProvider,
'filterModel' => $ExhibitionsSearch,
'summary' => false,
'columns' => [
//'id',
[
'attribute' => 'name',
'value' => 'name',
'filterInputOptions' => [
'title' => 'Для пошуку статті введіть текст в поле і натисніть Enter',
'class' => 'form-control',
'placeholder' => 'Для пошуку статті введіть текст в поле і натисніть Enter'
],
'contentOptions' => function($dataProvider) {
return ['value' => $dataProvider->name, 'id' => 'qualification_crime_or_misconduct_name-'.$dataProvider->id, 'class' => ''];
},
],
[
'attribute' => 'Вибір',
'filter' => false,
'format' => 'raw',
'value' => function ($articles_crime_code) {
return Html::tag('div', 'Обрати пункт', ['value' => $articles_crime_code->name, 'id' => $articles_crime_code->id,
'class' => 'btn btn-success add_qualification_crime_or_misconduct', 'data-dismiss' => 'modal']);
}
],
],
]);


Pjax::end();
*/?>