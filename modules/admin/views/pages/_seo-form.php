<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PagesSeoTrl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-seo-trl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->hiddenInput(['value' => $page_id])->label(false) ?>

    <?= $form->field($model, 'lang_id')->hiddenInput(['value' => $lang_id])->label(false); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
