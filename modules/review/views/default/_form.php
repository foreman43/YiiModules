<?php

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
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?php echo count($keyValueCityList) > 0
        ? $form->field($model, 'city_id')->checkboxList($keyValueCityList)
        : ''?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
