<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pages Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'type',
            'block_value',
            'block_template',
            // 'label',
            // 'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
