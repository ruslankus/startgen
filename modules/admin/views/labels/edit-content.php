<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $lang app\modules\admin\models\Languages */

$this->title = 'Edit Label Content ' . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'slidi id - ' . $label_id, 'url' => ['view', 'id' => $label_id ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'lang', 'label_id'))   ?>

</div>
