<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as ImperaviWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CategoryContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->hiddenInput(['value' => $category_id])->label(false) ?>

    <?= $form->field($model, 'lang_id')->hiddenInput(['value' => $lang->id])->label(false)  ?>

    <?= $form->field($model, 'title_seo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_seo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snippet')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget(ImperaviWidget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen'
            ]
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
