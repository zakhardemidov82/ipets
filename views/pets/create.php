<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pets */

$this->title = 'Создать карту питомца';
$this->params['breadcrumbs'][] = ['label' => 'Питомцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
