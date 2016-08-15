<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Headlines */

$this->title = 'Create Headlines';
$this->params['breadcrumbs'][] = ['label' => 'Headlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headlines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
