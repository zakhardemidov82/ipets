<?php
/**
 * Created by PhpStorm.
 * User: Захареус
 * Date: 30.01.2020
 * Time: 13:48
 */
use app\models\Image;
use yii\helpers\Html;
?>


<div class="row diplom">
    <h2>Усі нагородження собаки по кличці <?= $name?></h2>

    <?php
    foreach ($petIdes as $item){

        $images = Image::find()->where(['itemId' =>$item['id'],'modelName' => "Diploma"])->asArray()->all();

        foreach ($images as $image){
            $description = \app\models\Diploma::findOne($image['itemId']);
            echo "<div class=\"col-md-4 center\">";
            echo "<img class=\"dip\" src=\"\\upload/store/".$image['filePath']."\">";
            echo "<p></p>";
            echo "<div class=\"description\">".$description['award_description']."</div>";
            echo "<p></p>";
            echo Html::a('Завантажити', ['diploma/download', 'id' => $image['itemId']], ['class' => 'btn btn-primary']);
            echo "<p></p>";
            echo "<hr />";
            echo "</div>";

        }
    }
    ?>

</div>