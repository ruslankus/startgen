<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Sliders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliders-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput() ?>

    <?= $form->field($model, 'link_value')->textInput(['maxlength' => true]) ?>

    <?php if(!empty($model->img)): ?>
    <div class="form-group">
        <label>Current photo</label>
        <div>
            <?= Html::img("@web/images/sliders/{$model->img}", ['width' => '200'])?>
        </div>
    </div>
    <?php endif;?>
    <?= $form->field($model, 'upload_image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
