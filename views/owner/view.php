
<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use app\models\PetName;
use app\models\Pet;
$this->title = $model->last_name.' '.$model->first_name.' '.$model->middle_name;
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

<div class="owner-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Змінити дані', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що бажаєте видалити цю картку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'last_name',
            'last_name_trans',
            'first_name',
            'first_name_trans',
            'middle_name',
            'adres_index',
            'city',
            'street',
            'house',
            'flat',
            'phone_home',
            'phone_work',
            'email:email',
            'site',
            'date_of_entry',
            'cipher_in_the_breeding_factory',
            'KSU_code',
            'comments:ntext',
        ],
    ]) ?>
    <div class="">
        <?php
        $petnames = PetName::find()->where(['ownerId' => $id])->all();
        echo "<p>Список собак, власником яких є "." ".$model->last_name.' '.$model->first_name.' '.$model->middle_name."</p>";

        echo "<ul>";
            foreach ( $petnames  as  $petname ){
                $id = $petname['id'];
                echo "<li>";
                        $pets = Pet::find()->where(['nameId' => $id])->all();
                        foreach ( $pets  as  $pet) {
                            echo "<a href=".\yii\helpers\Url::to(['pet/view', 'id' => $pet['id']]).">".$petname['name']."</a>";
                        }
                echo "</li>";
                    }
        echo "</ul>";
        ?>
    </div>

    <p>
    <?= Html::a('Додати собаку', ['pet/create-name', 'id' => $model->id, 'clubId' => $clubId,],  ['class' => 'btn btn-primary']) ?>
    </p>
</div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

