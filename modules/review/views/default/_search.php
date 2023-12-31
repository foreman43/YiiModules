<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\review\models\ReviewSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_city') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'id_author') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
