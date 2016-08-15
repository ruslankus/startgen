<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Headlines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headlines-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Headlines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            [
                'attribute' => 'img',
                'value' => function($data)
                {
                    return "<div style='background-color: #0000aa'>".
                        Html::img("@web/images/{$data->img}",['width' => '50', 'height' => '50']) ."</div>";
                },
                'format' => 'html'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [

                    'update' => function()
                    {
                        return false;
                    },
                    'delete' => function()
                    {
                        return false;
                    }

                ]
            ],

        ],
    ]); ?>
</div>
