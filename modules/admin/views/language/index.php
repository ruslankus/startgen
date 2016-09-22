<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Languages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'prefix',
            'locale',
            'name',
            [
                'attribute' => 'active',
                'value' => function($data)
                {
                    return ($data->active)? "<a class='btn btn-sm  btn-success' href='' >On</a>" :
                        "<a class='btn btn-sm btn-danger' href='' >Off</a>" ;

                },
                'format' => 'html'
            ],


            [
                'attribute' => 'default',
                'value' => function($data)
                {
                    return ($data->default) ? "Yes" : " ---";
                },
                'format' => 'html'

            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',

                'buttons' => [

                    'view' => function($url, $model)
                    {
                        return $model->default ? "" : Html::a('Update', $url);
                    },
                    'update' => function($data)
                    {
                        return false;
                    },
                    'delete' => function($data)
                    {
                        return false;
                    },


                ]

            ],
        ],
    ]); ?>
</div>
