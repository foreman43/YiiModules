<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\modules\city\models\City;

/** @var yii\web\View $this */
/** @var app\modules\review\models\Review $model */
/** @var yii\widgets\ActiveForm $form */
$model->id_city = Yii::$app->session->get('city') ?? 1;
?>

<div class="review-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <img src="" alt="" id="image-showcase" width="100" height="100">

    <?= $form->field($model, 'id_city')->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(City::find()->all(),'id', 'name'),
        'language' => 'ru',
        'options' => [
            'placeholder' => 'Выберите город или оставьте пустым чтобы применить ко всем городам',
            'multiple' => true
        ],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script>
        const fileInput = document.getElementById('review-img');

        fileInput.addEventListener('change', e => {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                document.getElementsByName('Review[img]')[0].value = reader.result;
               document.getElementById('image-showcase').src = reader.result;
            });

            reader.readAsDataURL(file);
        })
    </script>

</div>
