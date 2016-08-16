<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->hiddenInput(['value' => $model->parent_id])->label(false) ?>

    <?php if(!empty($model->img)): ?>
    <div class="form-group">
        <label>Current photo</label>
        <div>
            <?= Html::img("@web/images/product-category/{$model->img}", ['width' => '150'])?>
        </div>
    </div>
    <?php endif;?>
    <?= $form->field($model, 'upload_image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
