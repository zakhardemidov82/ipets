<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Breed;
use app\models\Color;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pet-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?php
            $breed = Breed::find()->all();
            $items = ArrayHelper::map($breed,'name','name');
            $params = [
                'prompt' => ''
            ];
            echo $form->field($model, 'breed')->dropDownList($items,$params);
            ?>
            <?php
            $color = Color::find()->all();
            $items = ArrayHelper::map($color,'name','name');
            $params = [
                'prompt' => ''
            ];
            echo $form->field($model, 'color')->dropDownList($items,$params);
            ?>
            <?= $form->field($model, 'gender')->dropDownList([
                '0' => '',
                '1' => 'Кобель',
                '2' => 'Сука',
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dob')->widget(
                DatePicker::className(), [
                'inline' => true,
                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>
    </div>
    <div class="row hidd">
    <?=$form->field($model, 'nameId')->checkbox([ 'value' => $id, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'pedigree_number')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'number_KSU')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'number_FCI')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'registration_club')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'breeding_club')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'father')->textInput() ?>

    <?= $form->field($model, 'mother')->textInput() ?>

    <?= $form->field($model, 'dignityId')->textInput() ?>

    <?= $form->field($model, 'awardsId')->textInput() ?>

    <?= $form->field($model, 'puppy_card_number')->textInput() ?>

    <?= $form->field($model, 'participation_in_the_exhibition')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
