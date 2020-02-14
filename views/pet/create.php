<?php

use yii\helpers\Html;
use app\models\PetName;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */

$this->title = 'Створити картку собаки';
?>
<div class="pet-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php
    $owner = PetName::findOne($id);
    $ownerId = $owner['ownerId'];
    ?>
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'ownerId' => $ownerId,
        'clubId' => $clubId,
    ]) ?>

</div>
