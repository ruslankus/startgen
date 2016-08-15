<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $lang app\modules\admin\models\Languages */

$this->title = 'Edit headline Content ' . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Headlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'headline id - ' . $headline_id, 'url' => ['view', 'id' => $headline_id ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headline-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'lang', 'headline_id'))   ?>

</div>
