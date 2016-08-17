<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductContent */

$this->title = 'Create Product Content';
$this->params['breadcrumbs'][] = ['label' => 'Product Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
