<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CategoryContent */

$this->title = 'Create category content -' . $category->label . "- " . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->label , 'url' => ['view', 'id' => $category->id]];
$this->params['breadcrumbs'][] = 'Update content - ' . $lang->name;

$category_id = $category->id;
?>
<div class="category-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'category_id', 'lang')) ?>

</div>
