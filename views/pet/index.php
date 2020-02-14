<?php
use yii\helpers\Html;
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
$this->title = 'Собаки';
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
<div class="pets-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    echo "<table class=\"tab\">
                <tr><th>Порода</th><th>Кличка</th><th>Окрас</th><th>Пол</th><th>ПІБ власника</th><th>Подивитись</th><th>Змінити</th></tr>";
                foreach ($pets as $pet) {
                    $id = $pet['nameId'];
                    $petname = PetName::findOne($id);
                    $owner = Owner::findOne($petname['ownerId']);
                    echo "<tr><td>" . $pet['breed'] . "</td><td>" . $petname['name'] . "</td><td>" . $pet['color'] . "</td><td>" . $pet['gender'] . "</td>";
                    echo "<td><a href=" . \yii\helpers\Url::to(['owner/view', 'id' => $owner['id']]) . ">" . $owner->last_name . " " . $owner->first_name . " " . $owner->middle_name . "</a></td>";
                    echo "<td><a class=\"btn btn-view\" href=" . \yii\helpers\Url::to(['pet/view', 'id' => $pet['id'], 'clubId' => $clubId]) . ">Подивитись</a></td>";
                    echo "<td><a class=\"btn btn-view\" href=" . \yii\helpers\Url::to(['pet/update', 'id' => $pet['id'], 'clubId' => $clubId]) . ">Змінити</a></td>";
                    echo "</tr>";
                }
    echo "</table>";
    ?>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
