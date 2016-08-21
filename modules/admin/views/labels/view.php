<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Languages;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Labels */

$this->title = $model->label;
$this->params['breadcrumbs'][] = ['label' => 'Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$label_content_map;

$lang_map = Languages::getLangMap();


?>
<div class="labels-view">

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
        ],
    ]) ?>

    <div>
        <h3>Label content</h3>

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
                        <?php if(!empty($label_content_map[$id])):
                            $content =  $label_content_map[$id];
                            ?>
                            <p>
                                <?= $content['content']; ?>
                            </p>


                            <div class="text-center">
                                <a href="<?= Url::to(["/admin/labels/content-edit", 'lang_id' => $id,
                                    'label_id' => $model->id])?>" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </div>
                        <?php else:?>
                            <div class="text-center">
                                <a href="<?= Url::to(['/admin/labels/content-create','lang_id' => $id,
                                    'label_id' => $model->id ])?>" class="btn btn-success">
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
