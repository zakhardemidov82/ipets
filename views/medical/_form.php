<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Medical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medical-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row hidd">
        <?=$form->field($medical, 'petId')->checkbox([ 'value' => $petId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="col-md-3">
        <?= $form->field($medical, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
