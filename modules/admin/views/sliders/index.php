<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sliders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'label',
            //'link',
            //'link_value',
            [
                'attribute' => 'img',
                'value' => function($data)
                {
                    return Html::img("@web/images/sliders/{$data->img }", ['width' => 300]);
                },
                'format' => 'html'
            ],

            [
                'attribute' => 'active',
                'value' => function($data)
                {
                    return !empty($data->active) ? 'Active' : "Switch Off";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
