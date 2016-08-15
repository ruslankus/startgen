<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',

            [
                'attribute' => 'main',
                'value' => function($data)
                {
                    return ($data->main)? "Yes" : '';
                }

            ],
            //'order',
            [
                'attribute' => 'blocks',
                'value' => function($data)
                {
                    return Html::a("Pages blocks",['page-blocks', 'id' => $data->id],["class" => "btn btn-xs btn-info"]);
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
                    },


                ]
            ],
        ],
    ]); ?>
</div>
