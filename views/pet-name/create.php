<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PetName */

$this->title = 'Create Pet Name';
$this->params['breadcrumbs'][] = ['label' => 'Pet Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pet-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
