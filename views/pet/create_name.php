<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Owner;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Pet */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="pet-name-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?/*= $form->field($model, 'ownerId')->textInput(['placeholder' => $id]) */?>

    <?=$form->field($model, 'ownerId')->checkbox([ 'value' => $id, 'checked ' => true, 'class' => 'hidd'])->label('');?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
