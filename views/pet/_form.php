<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Breed;
use app\models\Color;
use dosamigos\datepicker\DatePicker;
use yii\widgets\MaskedInput;
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

<div class="pet-form">
    <?php $form = ActiveForm::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
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
                'Кобель' => 'Кобель',
                'Сука' => 'Сука',
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dob')->widget(
                MaskedInput::className(), [
                'clientOptions' => ['alias' =>  'dd-mm-yyyy']
            ]);?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        </div>
    </div>
    <div class="row hidd">
        <?=$form->field($model, 'nameId')->checkbox([ 'value' => $id, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="row hidd">
        <?=$form->field($model, 'ownerId')->checkbox([ 'value' => $ownerId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="row hidd">
        <?=$form->field($model, 'clubId')->checkbox([ 'value' => $clubId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'puppy_card_number')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'number_KSU')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'number_FCI')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'chip_number')->textInput() ?>
        </div>
    </div>
    <?= $form->field($model, 'registration_club')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'breeding_club')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'comments')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'work_certificate')->textarea(['rows' => 3]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'father')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'number_KSU_father')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'mother')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'number_KSU_mother')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'dignity')->dropDownList([
                '0' => '',
                'Дуже добре' => 'Дуже добре',
                'Відмінно' => 'Відмінно',
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'participation_in_the_exhibition')->dropDownList([
                '0' => '',
                'Так' => 'Так',
                'Ні' => 'Ні',
            ]); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
