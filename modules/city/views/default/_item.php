<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/** @var \app\modules\city\City $model */
?>
<div>
    <?php
    echo Html::a(
            $model->name,
            ['choose'],
            [
                'data' => [
                    'method' => 'post',
                    'params' => ['city' => $model->id]
                ],
            ]
    );
    ?>
    <hr>
</div>