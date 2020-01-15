<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Owner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'adres_index')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'house')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'flat')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'phone_home')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone_work')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
        </div>
    </div>




    <div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'cipher_in_the_breeding_factory')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'KSU_code')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>
    </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date_of_entry')->widget(
                DatePicker::className(), [
                'inline' => true,
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>
        <div class="col-md-3">
       <!-- --><?/*= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) */?>
        </div>
    </div>




    <?/*= $form->field($model, 'comments')->textarea(['rows' => 6]) */?>
    <div class="row">
        <div class="col-md-9">

            <?/*= $form->field($model, 'comments')->widget(CKEditor::className(), [

                'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),

            ]); */?>

        </div>
        <div class="col-md-3">
            <?/*= $form->field($model, 'dob')->widget(
                DateTimePicker::className(), [
                'inline' => true,
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);*/?>
            <?/*= $form->field($model, 'image')->fileInput() */?>
        </div>



    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
