<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diploma */

$this->title = 'Завантажити фото дипломів';
?>
<div class="diploma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'diplom' => $diplom,
        'petId' => $petId,
    ]) ?>

</div>
