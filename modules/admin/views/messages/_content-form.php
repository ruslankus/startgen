<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliders-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'message_id')->hiddenInput(['value' => $message_id])->label(false) ?>

    <?= $form->field($model, 'lang_id')->hiddenInput(['value' => $lang->id ])->label(false) ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
