<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Owner */

$this->title = 'Картка власника';
?>
<div class="owner-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'clubId' => $clubId,
    ]) ?>

</div>
