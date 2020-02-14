<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Exhibitions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exhibitions-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'name_trans')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'date')->widget(
                MaskedInput::className(), [
                'clientOptions' => ['alias' =>  'dd-mm-yyyy']
            ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">

    <?= $form->field($model, 'city_trans')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">

    <?= $form->field($model, 'rang')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
