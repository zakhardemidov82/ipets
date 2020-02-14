<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pet;
use app\models\PetName;

/* @var $this yii\web\View */
/* @var $model app\models\Exhibitions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exhibitions-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row hidd">
        <?=$form->field($model, 'exhibitionId')->checkbox([ 'value' => $id, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>


    <?php
    $petNames = PetName::find()->asArray()->all();
    /*if(isset($petNames)){*/
    $items = ArrayHelper::map($petNames,'id','name');
    $params = [
        'prompt' => 'Оберіть собаку для виставки'
    ];
    /*}*/
    /*if(isset($items)){*/
    echo $form->field($model, 'petId')->dropDownList($items,$params);
    /* }*/
    ?>



    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>