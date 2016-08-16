<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Languages;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->label;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$category_content_map;

$lang_map = Languages::getLangMap();

?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'label',
            [
                'attribute' => 'parent_id',
                'value' => !empty($model->parent)? $model->parent->label : ''
            ],
            [
                'attribute' => 'img',
                'value' => !empty($model->img) ? Html::img("@web/images/product-category/{$model->img}",
                    ['width' => 200]) : '',
                'format' => 'html'
            ]
        ],
    ]) ?>

    <div>
        <h3>Category content</h3>

        <table class="table table-bordered">
            <thead>
            <?php foreach ($lang_map as $lng):?>

                <th class="text-center"><?= $lng['name']?></th>

            <?php endforeach;  ?>
            </thead>

            <tbody>
            <tr>
                <?php foreach ($lang_map as $id => $lng):?>
                    <td>
                        <?php if(!empty($category_content_map[$id])):
                            $content =  $category_content_map[$id];
                            ?>
                            <p>
                                <strong>Title seo:</strong>
                                <?= $content['title_seo']; ?>
                            </p>

                            <p>
                                <strong>Title:</strong>
                                <?= $content['title']; ?>
                            </p>

                            <p>
                                <strong>SEO description:</strong>
                                <?= $content['description_seo']; ?>
                            </p>

                            <p>
                                <strong>SEO keywords:</strong>
                                <?= $content['keywords']; ?>
                            </p>

                            <p>
                                <strong>SEO keywords:</strong>
                                <?= $content['snippet']; ?>
                            </p>

                            <p>
                                <strong>Text:</strong>
                                <?= $content['text']; ?>
                            </p>
                            <div class="text-center">
                                <a href="<?= Url::to(["/admin/category/content-edit", 'lang_id' => $id,
                                    'category_id' => $model->id])?>" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </div>
                        <?php else:?>
                            <div class="text-center">
                                <a href="<?= Url::to(['/admin/category/content-create','lang_id' => $id,
                                    'category_id' => $model->id ])?>" class="btn btn-success">
                                    Create
                                </a>
                            </div>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
            </tbody>

        </table>

    </div>



</div>
