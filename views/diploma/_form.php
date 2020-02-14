<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diploma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diploma-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row hidd">
        <?=$form->field($diplom, 'petId')->checkbox([ 'value' => $petId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($diplom, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        </div>

        <div class="col-md-9">
            <?= $form->field($diplom, 'award_description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
