<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medical */

$this->title = 'Завантажити фото медкарти';
?>
<div class="medical-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'petId' => $petId,
        'medical' => $medical,
    ]) ?>

</div>
