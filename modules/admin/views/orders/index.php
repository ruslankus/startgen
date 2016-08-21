<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'phone',
            [
                'attribute' => 'visit_date',
                'value' => function($data)
                {
                    $dt = new DateTime($data->visit_date);
                    return $dt->format("Y-m-d H:i");
                }
            ],
            [
                'attribute' => 'car_id',
                'value' => function($data)
                {
                    return $data->car->name;
                }
            ],
            'is_seen',
            'is_active',
            // 'problem_description:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
