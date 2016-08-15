<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PagesSeoTrl */

$model;

$this->title = 'Update Pages Seo Trl: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page->label, 'url' => ['view', 'id' => $model->page_id]];
$this->params['breadcrumbs'][] = 'seo content - ' . $lang->name;
?>
<div class="pages-seo-trl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_seo-form', compact('model', 'page_id', 'lang_id')) ?>

</div>