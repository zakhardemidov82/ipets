<?php

use yii\helpers\Html;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\models\Owner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres_index')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'flat')->textInput() ?>

    <?= $form->field($model, 'phone_home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_entry')->textInput() ?>

    <?= $form->field($model, 'cipher_in_the_breeding_factory')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KSU_code')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'comments')->textarea(['rows' => 6]) */?>
    <div class="row">
        <div class="col-md-9">

            <?/*= $form->field($model, 'comments')->widget(CKEditor::className(), [

                'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),

            ]); */?>
            <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>
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
            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        </div>



    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
