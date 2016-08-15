<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $page app\modules\admin\models\Pages */
$page;

$this->title = 'Page blocks for page -  ' . $page->label;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $page->label, 'url' => ['view', 'id' => $page->id]];
$this->params['breadcrumbs'][] = 'Block list'
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

        'page_id',
        'label',
        [
            'attribute' =>'type',
            'value' => function($data)
            {

                return $data->blockType->name;
            }
        ],
        'block_value',

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
                'view' => function($url, $model, $key)
                {
                    $url = Url::to(['/admin/pages/view-page-block', 'block_id' => $model->id]);
                    $link =  '<a href="'.$url .'"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    return ('html' == $model->blockType->label) ? $link : false;
                }


            ]
        ],

    ]



    ]); ?>