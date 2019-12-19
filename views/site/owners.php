<?php
use app\models\Image;


$this->title = 'Владельцы
';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row content-one">
    <?php foreach($owners as $owner): ?>
        <a href="<?= \yii\helpers\Url::to(['site/view-player', 'id' => $owner['id'], 'modelName'=> 'Owner'])?>">
            <div class="col-md-4 player">
                <?php
                $images = Image::find()->where(['itemId'=> $owner['id'], 'modelName'=> 'Owner'])->all();
                ?>
                <?php foreach($images as $img): ?>
                    <img src="<?=Yii::getAlias('@web')?>/upload/store/<?= $img['filePath']?>" class="owner-view" alt="...">
                <?php endforeach;?>
                <h4><?= $owner['last_name']?></h4>
                <h4><?= $owner['first_name']?></h4>
                <h4><?= $owner['middle_name']?></h4>
                <h4><?= $owner['cipher_in_the_breeding_factory']?></h4>
                <h4><?= $owner['comments']?></h4>
            </div>
        </a>
    <?php endforeach; ?>
</div>
