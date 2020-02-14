<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */

$this->title = 'Змінити дані: ' . $name;
?>
<div class="pets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_u', [
        'model' => $model,
        'id' => $id,
        'name' => $name,
        'nameId' => $nameId,
        'clubId' => $clubId,
    ]) ?>

</div>
