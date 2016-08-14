<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $lang app\modules\admin\models\Languages */

$this->title = 'Create Slide Content ' . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'slidi id - ' . $slide_id, 'url' => ['view', 'id' => $slide_id ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'lang', 'slide_id'))   ?>

</div>
