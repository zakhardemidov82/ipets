<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exhibitions */

$this->title = 'Змінити дані по виставці: ' . $model->name;
?>
<div class="exhibitions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
