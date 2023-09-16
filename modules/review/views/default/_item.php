<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/** @var \app\modules\review\Review $model */
?>
<div>
    <a href="<?php echo Url::to(['/review/default/view', 'id'=>$model->id]) ?>"><h3><?php echo Html::encode($model->title); ?></h3></a>
    <div>
        <?php
        echo StringHelper::truncateWords($model->getEncodedText(),50);
        echo "<p class=\"text-muted\">{$model->author->last_name} {$model->author->first_name[0]}. </p>";
        ?>
    </div>
    <hr>
</div>