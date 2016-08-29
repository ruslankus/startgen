<?php
    use yii\helpers\Html;
    use app\models\Labels;
?>

<div class="grids">
    <h4><?= Labels::t('what_we_do') ?></h4><h5> </h5><div class="clearfix"> </div>

    <div class="section group">

        <?php foreach ($headline_array as $head):

           $content = array_shift($head['content']);
        ?>

            <div class="col-md-3 we-do">
            <div class="active-grid">
                <h3>

                    <?= Html::img("@web/images/{$head['img']}", ['height' => 36, 'width' => 44,
                        'alt' => $content['title']]) ?>
                    <?= $content['title']?>
                </h3>
                <p><?= $content['text'] ?> </p>
            </div>
        </div>

        <?php endforeach;?>

        <div class="clearfix"> </div>
    </div>


</div>