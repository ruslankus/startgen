<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SlidersContent */
/* @var $lang app\modules\admin\models\Languages */

$this->title = 'Edit Label Content ' . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Message', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'message id - ' . $message_id, 'url' => ['view', 'id' => $message_id ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-content-edit">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'lang', 'message_id'))   ?>

</div>
