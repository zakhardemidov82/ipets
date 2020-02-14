<?php
/**
 * Created by PhpStorm.
 * User: Захареус
 * Date: 12.02.2020
 * Time: 15:27
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Club;
?>

<p class="superadmin">Перейти в админку клуба</p>

<?php
$clubs = Club::find()->all();

echo "<ul>";
foreach ( $clubs  as  $club){
    echo "<li class=\"list\">";
    /*echo "<a href=".\yii\helpers\Url::to(['admin/index', 'clubId' => $club['id']]).">".$club['name']."</a>";*/
    echo  "<div class=\"col-md-3\"><a class = \"list_club\"  href=".\yii\helpers\Url::to(['admin/index', 'clubId' => $club['id']]).">".$club['name']."</a></div>";
    echo  Html::a('Создать модератора', ['creator/create_moderator', 'clubId' => $club['id']],  ['class' => 'btn btn-create']);
    echo  Html::a('Создать исполнителя', ['creator/create_editor', 'clubId' => $club['id']],  ['class' => 'btn btn-create']);
    echo "</li>";
}
echo "</ul>";
?>
<p>
    <?= Html::a('Добавить новый клуб', ['club/create'],  ['class' => 'btn btn-primary']) ?>
</p>
