<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'old_id',
            'name',
            'part_number',
            //'text:ntext',
            //'text2:ntext',

            [
                'attribute' => 'category_id',
                'value' => function($data)
                {
                    return $data->category->label;
                }
            ],
            // 'category_name',

            [
               'attribute' => 'img',
                'value' => function($data)
                {

                    return !empty($data->img) ? Html::img("@web/images/products/{$data->old_id}/thumb_{$data->img}",
                        ['width' => 80]) : "";

                },
                'format' => 'html'

            ],
            // 'img_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
