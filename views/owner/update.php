<?php

use yii\helpers\Html;
$this->title = 'Картка власника';
?>
<!--<div class="container">-->
        <div class="owner-update">

            <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

            <?= $this->render('_form', [
                'model' => $model,
                'clubId' => $clubId,
            ]) ?>

        </div>
