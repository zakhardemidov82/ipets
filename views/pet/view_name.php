    <?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pet */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="pets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Змінити дані', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити картку', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що бажаєте видалити цю інформацію?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'breedId',
            'name',
            'colorId',
            'ownerId',
            'dob',
            'genderId',
            'pedigree_number',
            'number_KSU',
            'number_FCI',
            'registration_club',
            'breeding_club',
            'comments:ntext',
            'father',
            'mother',
            'dignityId',
            'awardsId',
            'puppy_card_number',
            'participation_in_the_exhibition',
        ],
    ]) ?>

</div>
