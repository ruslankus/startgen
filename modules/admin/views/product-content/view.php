<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductContent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'lang_id',
            'product_title',
            'product_snippet:ntext',
            'product_description:ntext',
            'product_text:ntext',
        ],
    ]) ?>

</div>
