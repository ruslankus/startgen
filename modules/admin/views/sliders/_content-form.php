<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliders-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slide_id')->hiddenInput(['value' => $slide_id])->label(false) ?>

    <?= $form->field($model, 'lang_id')->hiddenInput(['value' => $lang->id ])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
