<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Адмін-панель',
        'brandUrl' => ['admin/index', 'clubId' => $clubId],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right',
            'clubId' => $clubId,
        ],
        'items' => [
            ['label' => 'Власники', 'url' => ['/owner/index','clubId' => $clubId]],
            ['label' => 'Собаки', 'url' => ['/pet/index','clubId' => $clubId]],
            ['label' => 'Виставки', 'url' => ['/exhibitions/index','clubId' => $clubId]],
            ['label' => 'В\'язки', 'url' => ['#']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Вихід із користувача (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <div class="owner-form">
            <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="row hidd">
            <?=$form->field($model, 'clubId')->checkbox([ 'value' => $clubId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
        </div>
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
        <div class="col-md-4">



            <?php $trans=Inflector::transliterate($model['first_name']);?>
            <?/*= $trans; */?>




            <?= $form->field($model, 'last_name_trans')->textInput(/*['maxlength' => true]*/)->input('text', ['placeholder' => "$trans"]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'first_name_trans')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>


        <div class="raz">Показати дані паспорта</div>


    <div class="row pop_up">
        <div class="col-md-4">
            <?= $form->field($model, 'passport_series')->textInput(['maxlength' => true])->label('Серія паспорта'); ?>
            <?= $form->field($model, 'passport_ID')->textInput(['maxlength' => true])->label('Номер паспорта'); ?>
            <?= $form->field($model, 'date_of_issue')->widget(
                MaskedInput::className(), [
                'clientOptions' => ['alias' =>  'dd-mm-yyyy']
            ])->label('Дата видачі');?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'issued_by')->textarea(['rows' => 8])->label('Ким виданий'); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
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
            <?= $form->field($model, 'phone_home')->widget(
                MaskedInput::className(), [
                'mask' => '+99 (999) 999-99-99',
            ]); ?>
        </div>
        <div class="col-md-3">

            <?= $form->field($model, 'phone_work')->widget(
                MaskedInput::className(), [
                'mask' => '+99 (999) 999-99-99',
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
        </div>
    </div>




    <div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'cipher_in_the_breeding_factory')->textInput(['maxlength' => true]) ?>

    </div>
        <div class="col-md-3">
            <?= $form->field($model, 'KSU_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date_of_entry')->widget(
                MaskedInput::className(), [
                'clientOptions' => ['alias' =>  'dd-mm-yyyy']
            ]);?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'comments')->textarea(['rows' => 1]) ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<script>
    $('.raz').on('click', function(){
        var $that = $(this),
            nc = $that.next('.pop_up').length,
            block = nc ? $that.next('.pop_up') : $that.parent('.pop_up');
        block.slideToggle(function(){
            $('.raz',block).add(block.prev('.raz'))
                .text(block.is(':visible') ? 'Приховати дані паспорта' : 'Показати дані паспорта');
        });
    });
</script>