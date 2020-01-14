<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */

$this->title = 'Изменить данные: ' . $model->nameId;
$this->params['breadcrumbs'][] = ['label' => 'Питомцы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nameId, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить данные';
?>
<div class="pets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
