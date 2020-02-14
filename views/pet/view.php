<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use xj\qrcode\QRcode;
/*use xj\qrcode\widgets\Email;*/
use xj\qrcode\widgets\Text;
use yii\grid\GridView;
use app\models\PetName;
use app\models\Owner;
use yii\data\ActiveDataProvider;
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
$this->title = $name;
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
<div class="pets-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= "<h3>( Власник - <a href=\"".\yii\helpers\Url::to(['owner/view', 'id' => $owner['id']])."\">".$owner['last_name']." ".$owner['first_name']." ".$owner['middle_name']."</a> )</h3>";?>
    <div class="row">
        <div class="col-md-4">
            <?php foreach($images as $img): ?>
                 <?php if($img['isMain']): ?>
                    <img src="<?=Yii::getAlias('@web')?>/upload/store/<?= $img['filePath']?>" class="main-pet" alt="...">
                 <?php endif;?>
            <?php endforeach;?>
        </div>
        <div class="col-md-8">
            <p>
                <?= Html::a('Змінити дані', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
            <p>
                <?= Html::a('Видалити картку', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Ви впевнені, що бажаєте видалити цю картку?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

        </div>
    </div>

    <p>
        <?= Html::a('Додати фото дипломів', ['diploma/diplom', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Додати фото медкарти', ['medical/medical', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'breed',
            /*'nameId',*/
            /*'ownerId',*/
            'color',
            'dob',
            'gender',
            'number_KSU',
            'number_FCI',
            'chip_number',
            'registration_club',
            'breeding_club',
            'comments',
            'number_KSU_father',
            'number_KSU_mother',
            'father',
            'mother',
            'dignity',
            'puppy_card_number',
            'participation_in_the_exhibition' ,
            'work_certificate',
        ],
    ]) ?>


    <p>
        <?= Html::a('Подивитись дипломи', ['diploma/diplom-view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Подивитись медкарту', ['medical/medical-view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

   <!-- --><?php
/*    echo Text::widget([
    'outputDir' => '@webroot/upload/qrcode',
    'outputDirWeb' => '@web/upload/qrcode',
    'ecLevel' => QRcode::QR_ECLEVEL_L,
    'text' => 'Привет кодер.укр',
    'size' => 6,
    ]);

    /*echo Text::widget([
    'text' => 'info@кодер.укр',
    'size' => 3,
    'margin' => 4,
    'ecLevel' => QRcode::QR_ECLEVEL_L,
    ]);*/

    /*echo Email::widget([
    'email' => 'info@кодер.укр',
    'subject' => 'Тема письма',
    'body' => 'Важное сообщение',
    ]);*/?>

</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
