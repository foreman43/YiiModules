<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\modules\city\models\City;

/** @var yii\web\View $this */
/** @var app\modules\review\models\Review $model */
/** @var yii\widgets\ActiveForm $form */

$cityList = City::find()->all();
$keyValueCityList = [];
foreach ($cityList as $item) {
    $keyValueCityList[$item->id] = $item->name;
}
//yii\helpers\Html::activeListBox()
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'id_city')->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(City::find()->all(),'id', 'name'),
        'language' => 'ru',
        'options' => [
            'placeholder' => 'Выберите город...',
            'multiple' => true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
