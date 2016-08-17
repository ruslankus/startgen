<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'old_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'part_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catalog_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($category_map) ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?php if(!empty($model->img)): ?>
        <div class="form-group">
            <label>Current photo</label>
            <div>
                <?php if(!empty($model->old_id)): ?>
                <?= Html::img("@web/images/products/{$model->old_id}/thumb_{$model->img}", ['width' => '100'])?>
                <?php else: ?>
                    <?= Html::img("@web/images/products/new/thumb_{$model->img}", ['width' => '100'])?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif ?>
    <?= $form->field($model, 'upload_image')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
