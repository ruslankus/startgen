<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            [
                'attribute' =>'parent_id',
                'value' => function($data)
                {
                    return !empty($data->parent)? $data->parent->label : '';
                }
            ],

            [
                'attribute' => 'img',
                'value' => function($data)
                {
                    return !empty($data->img) ? Html::img("@web/images/product-category/{$data->img}",
                        ['width' => 100]) : '';
                },
                'format' => 'html'

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
