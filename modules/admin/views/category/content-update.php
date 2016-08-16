<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CategoryContent */

$this->title = 'Update Category Content -' . $model->category->label . "- " . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category->label , 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update content - ' . $lang->name;
?>
<div class="category-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'category_id', 'lang')) ?>

</div>
