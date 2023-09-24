<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\review\models\Review $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="review-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->id == $model->id_author)
        {
            Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <p class="text-muted">
        <small>
            Created: <?php echo Yii::$app->formatter->asRelativeTime($model->date_create) ?>
        </small>
    </p>


    <?php
    echo "<p>{$model->getEncodedText()}</p>";
    echo Html::img($model->img);
    ?>

</div>
