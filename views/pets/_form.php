<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'breedId')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colorId')->textInput() ?>

    <?= $form->field($model, 'ownerId')->textInput() ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'genderId')->textInput() ?>

    <?= $form->field($model, 'pedigree_number')->textInput() ?>

    <?= $form->field($model, 'number_KSU')->textInput() ?>

    <?= $form->field($model, 'number_FCI')->textInput() ?>

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
