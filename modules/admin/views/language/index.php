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
        <?= Html::a('Create Languages', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return ($data->active)? "<a class='btn btn-sm btn-danger' href='' >Off</a>" :
                        "<a class='btn btn-sm btn-success' href='' >On</a>" ;

                },
                'format' => 'html'
            ],


            [
                'attribute' => 'default',
                'value' => function($data)
                {
                    return ($data->default) ? "Yes" :
                        "<a class='btn btn-sm btn-success' href='' >Make default</a>";
                },
                'format' => 'html'

            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
