<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use ipinfo\ipinfo\IPinfo;

$this->title = 'City Reviews';

$client = new IPinfo('6195168d468f5c');
$details = $client->getDetails();
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловать!</h1>
        <p class="lead"><?php echo $details->city ?? '*имя города*' ?> - это ваш город?</p>

        <p>
            <?php echo Html::a('Да', ['choose', 'city' => $details->city ?? '*имя города*'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('Нет, выбрать из списка', ['/city'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>
</div>
</div>
