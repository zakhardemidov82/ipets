<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medical */

$this->title = 'Update Medical: ' . $model->id;
?>
<div class="medical-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
