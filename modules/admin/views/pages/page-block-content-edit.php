<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as ImperaviWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PagesSeoTrl */

$model;

$this->title = 'Update block content language : ' . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "page: ". $model->block->page->label, 'url' => ['view', 'id' => $model->block->page_id]];
$this->params['breadcrumbs'][] = ['label' => "block: ".$model->block->label, 'url' => ['view-page-block', 'block_id' => $model->block_id ]];
$this->params['breadcrumbs'][] = 'Content - ' . $lang->name;
?>
<div class="pages-block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pages-seo-trl-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'block_id')->hiddenInput(['value' => $block_id])->label(false) ?>

        <?= $form->field($model, 'lang_id')->hiddenInput(['value' => $lang_id])->label(false); ?>

        <?= $form->field($model, 'content')->widget(ImperaviWidget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen'
                ]
            ]
        ]);

        ?>



        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>