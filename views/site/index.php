<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'City Reviews';
//todo: нужен разультат работы функции определения города
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловать!</h1>
        <p class="lead"><?php echo 'Город' ?? '*имя города*'?> - это ваш город?</p>

        <p>
            <?php echo Html::a('Да', ['choose'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('Нет, выбрать из списка', ['/city'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>
    </div>
</div>
