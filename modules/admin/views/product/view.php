<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\admin\models\Languages;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$product_content_map;

$lang_map = Languages::getLangMap();

$image_path = !(empty($model->old_id)) ? "@web/images/products/{$model->old_id}/"
    : "@web/images/products/new/";

?>

<div class="products-view">

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
            'old_id',
            'name',
            'part_number',
            'catalog_number',
            'text:ntext',
            'text2:ntext',
            'category_id',
            'category_name',
            [
                'attribute' => 'img',
                'value' => !empty($model->img) ? Html::img("{$image_path}thumb_{$model->img}",
                    ['width' => 100]) : "" ,
                'format' => 'html'
            ]

        ],
    ]) ?>


    <div>
        <h3>Product content</h3>

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
                        <?php if(!empty($product_content_map[$id])):
                            $content =  $product_content_map[$id];
                            ?>
                            <p>
                                <strong>Title :</strong>
                                <?= $content['product_title']; ?>
                            </p>

                            <p>
                                <strong>Snippet:</strong>
                                <?= $content['product_snippet']; ?>
                            </p>

                            <p>
                                <strong>Description:</strong>
                                <?= $content['product_description']; ?>
                            </p>

                            <p>
                                <strong>Text:</strong>
                                <?= $content['product_text']; ?>
                            </p>

                            <p>
                                <strong>SEO keywords:</strong>
                                <?= $content['product_snippet']; ?>
                            </p>


                            <div class="text-center">
                                <a href="<?= Url::to(["/admin/product/content-edit", 'lang_id' => $id,
                                    'product_id' => $model->id])?>" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </div>
                        <?php else:?>
                            <div class="text-center">
                                <a href="<?= Url::to(['/admin/product/content-create','lang_id' => $id,
                                    'product_id' => $model->id ])?>" class="btn btn-success">
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
