<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$this->title = 'Власники';
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
          <!--  <?/*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) */?>
            --><?/*= Alert::widget() */?>
            <div class="owner-index">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Створити картку власника', ['create', 'clubId' => $clubId], ['class' => 'btn btn-success']) ?>
                </p>

                <?= ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'last_name',
                        'first_name',
                        'middle_name',
                        // 'adres_index',
                        //'city',
                        //'street',
                        //'house',
                        //'flat',
                        //'phone_home',
                        'phone_work',
                        'email:email',
                        //'site',
                        //'date_of_entry',
                        //'cipher_in_the_breeding_factory',
                        //'KSU_code',
                        //'comments:ntext',
                        //'petsId',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'dropdownOptions' => [
                        'label' => 'Експортувати',
                        'class' => 'btn btn-secondary'
                    ]
                ]) . "<hr>\n".
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => ['clubId' => $clubId],
                    'columns' => [
                        'last_name',
                        'first_name',
                        'middle_name',
                        // 'adres_index',
                        //'city',
                        //'street',
                        //'house',
                        //'flat',
                        //'phone_home',
                        'phone_work',
                        'email:email',
                        //'site',
                        //'date_of_entry',
                        //'cipher_in_the_breeding_factory',
                        //'KSU_code',
                        //'comments:ntext',
                        //'petsId',

                        ['class' => 'yii\grid\ActionColumn',],
                    ],
                ]); ?>


            </div>
        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>