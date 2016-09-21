<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use app\models\Languages;
    use app\models\Labels;


 $lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>

<div class="services">
    <h4><?=  $content['title'] ?></h4><h5> </h5><div class="clearfix"> </div>
    <div>
        <?= $content['text']; ?>
    </div>

    <?php foreach ($parent_chunk_array as $chunk):?>
    <div class="section group">
        <?php foreach ($chunk as $item):

            $item_content = array_shift($item['content']);

        ?>
        <div class="col-md-6 listview_1_of_2">
            <div class="images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <?= Html::img("@web/images/product-category/{$item['img']}", ['alt' => $item_content['title']]) ?>
                </div>
                <div class="text list_2_of_1">
                    <h3><?= $item_content['title']?></h3>
                    <p><?= $item_content['snippet']?></p>
                    <div class="button">
                        <span>
                            <a href="<?= Url::toRoute(['catalog/category', 'language' => $lang_prefix, 'id' => $item['id']])?>">
                                <?= Labels::t('read_more')?>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <?php endforeach;?>


        <div class="clearfix"> </div>
    </div>
    <?php endforeach;?>


</div>
