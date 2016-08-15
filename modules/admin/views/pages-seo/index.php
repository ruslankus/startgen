<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages Seo Trls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-seo-trl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pages Seo Trl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'lang_id',
            'description:ntext',
            'keywords:ntext',
            // 'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
