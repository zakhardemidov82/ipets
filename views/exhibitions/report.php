<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PetExhibition;
use app\models\Pet;
use app\models\Owner;
use app\models\PetName;


$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>

<div class="row">

    <h1><?= Html::encode($this->title) ?></h1>


        <?php

        foreach ( $pets  as  $petId ){

            echo "<div class=\"col-md-6 report\">";
            $petName = PetName::findOne($petId['petId']);
            $pets = Pet::findOne(['nameId' => $petId['petId']]);
            $owner = Owner::findOne(['id' => $pets['ownerId']]);
            echo "<div class=\"col-md-6 \">Кличка</div><div class=\"col-md-6 \">".$petName['name']."</div>";
            echo "<p></p>";
            echo "<div class=\"col-md-6 \">Порода</div><div class=\"col-md-6 \">".$pets['breed']."</div>";
            echo "<p></p>";
            echo "<div class=\"col-md-6 \">Окрас</div><div class=\"col-md-6 \">".$pets['color']."</div>";
            echo "<div class=\"col-md-6 \">Код KSU</div><div class=\"col-md-6 \">".$pets['number_KSU']."</div>";
            echo "<div class=\"col-md-6 \">Клуб реєстрації</div><div class=\"col-md-6 \">".$pets['registration_club']."</div>";
            echo "<p></p>";
            if($pets['gender'] == "Кобель"){
                echo "<div class=\"col-md-6 \">Пол</div><div class=\"col-md-6 \">".$pets['gender']."/MALE</div>";
            }else{
                echo "<div class=\"col-md-6 \">Пол</div><div class=\"col-md-6 \">".$pets['gender']."/FEMALE"."</div>";
            }
            echo "<p></p>";
            echo "<div class=\"col-md-6 \">Власник</div><div class=\"col-md-6 \">".$owner['last_name']." ".$owner['first_name']." ".$owner['middle_name']."</div>";
            echo "</div>";
            echo "<p></p>";
        }
        ?>


</div>
<p></p>
<p>
    <?= Html::a('Роздрукувати звіт', ['exhibitions/view', 'id' => $model->id],  ['class' => 'btn btn-primary']) ?>
</p>