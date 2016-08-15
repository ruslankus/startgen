<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Languages;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PagesBlocks */

$this->title = "Block " . $model->label;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Page: '. $model->page->label , 'url' => ['view', 'id' => $model->page->id]];
$this->params['breadcrumbs'][] = $this->title;

$block_content_map;
$lang_map = Languages::getLangMap();
?>
<div class="pages-blocks-view">

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
            'page_id',
            [
                'attribute' => 'type',
                'value' => $model->blockType->name
            ],
            'block_value',
            'block_template',
            'label',
            'order',
        ],
    ]) ?>


    <div>
        <h3>Block content</h3>

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
                        <?php if(!empty($block_content_map[$id])):
                            $content =  $block_content_map[$id];
                            ?>


                            <p>
                                <?= $content['content']; ?>
                            </p>



                            <div class="text-center">
                                <a href="<?= Url::to(["/admin/pages/seo-edit", 'lang_id' => $id,
                                    'page_id' => $model->id])?>" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </div>
                        <?php else:?>
                            <div class="text-center">
                                <a href="<?= Url::to(['/admin/pages/seo-create','lang_id' => $id,
                                    'page_id' => $model->id ])?>" class="btn btn-success">
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
