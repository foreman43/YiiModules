<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/** @var \app\modules\review\Review $model */
$authorFullName = "{$model->author->last_name} {$model->author->first_name} {$model->author->patronymic}";
?>
<div>
    <a href="<?php echo Url::to(['/review/default/view', 'id'=>$model->id]) ?>"><h3><?php echo Html::encode($model->title); ?></h3></a>
    <div>
        <?php
        echo StringHelper::truncateWords($model->getEncodedText(),50);
        echo "<p>
            <a class=\"link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
                {$model->author->last_name} {$model->author->first_name[0]}. 
            </a>
        </p>";
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $authorFullName ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo "<p>Email: {$model->author->email}</p>";
                    echo "<p>Телефон: {$model->author->phone}</p>";
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <?php
                    echo Html::a(
                        'К отзывам этого автора',
                        ['/review/default/index?ReviewSearch%5Bid_author%5D=' . $model->author->id],
                        [
                            'class' => 'btn btn-primary'
                        ]
                    )
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>