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
        <div class="pet-name-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row hidd">
                <?=$form->field($model, 'clubId')->checkbox([ 'value' => $clubId, 'checked ' => true, 'class' => 'hidd'])->label('');?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Наприклад: "Тузік"']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'name_trans')->textInput(['maxlength' => true, 'placeholder' => 'Наприклад: "Tuzik"']) ?>
                </div>
            </div>
            <?=$form->field($model, 'ownerId')->checkbox([ 'value' => $id, 'checked ' => true, 'class' => 'hidd'])->label('');?>


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