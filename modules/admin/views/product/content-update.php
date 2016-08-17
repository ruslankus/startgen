<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductContent */

$this->title = 'Update Product Content: ' . $model->product->name . ". Language: " . $lang->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product->name, 'url' => ['view', 'id' => $model->product->id]];
$this->params['breadcrumbs'][] = 'Update';


?>
<div class="product-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_content-form', compact('model', 'lang', 'product_id'));  ?>

</div>
