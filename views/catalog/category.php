<?php

    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\Breadcrumbs;
    use app\models\Languages;
    use app\models\Labels;

    $category_content;
    $lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>
<div class="services category">
    <div>

        <?= Breadcrumbs::widget([
        //'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
        'homeLink' =>
            ['label' => Labels::t('catalog'), 'url' => ['catalog/index', 'language' => $lang_prefix] ],
        'links' => [

                [
                    'label' => $category_content['title'],
                    //'url' => ['post-category/view', 'id' => 10],

                ],

            ]
        ]);

        ?>


    </div>
    <h4><?= $category_content['title'] ?></h4><h5> </h5><div class="clearfix"> </div>

    <div><?= $category_content['text'] ?></div>


    <div class="section group">
        <?php foreach ($products as $prd):

            $thumb_link = "/images/products/{$prd['old_id']}/thumb_{$prd['img']}";
            $original_link = "/images/products/{$prd['old_id']}/original_{$prd['img']}";

        ?>

            <div class="col-xs-12 category_list_view">
                <div class="category__list_images clearfix">
                    <div class="listimg listimg_2_of_1">
                        <a href="<?= $original_link?>" data-lightbox="<?= $prd['name'] ?>" >
                            <?= Html::img("@web{$thumb_link}", ['alt' => $prd['name']])  ?>
                        </a>
                    </div>
                    <div class="text list_2_of_1">
                        <h3><?= $prd['name']?> </h3>
                        <p><?= $prd['text']?></p>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>




        <div class="col-xs-12 category_list_view">
            <div class="category__list_images clearfix">
                <div class="listimg listimg_2_of_1">
                    <img src="/images/products/thumb_CS1062.jpg" alt="">
                </div>
                <div class="text list_2_of_1">
                    <h3>
                        <a href="product_card.html">R1399 </a>
                    </h3>
                    <p>BOSCH - SCANIA (24V 5.5KW)</p>

                </div>

            </div>
        </div>





    </div>
    <nav class="text-center">
        <?php if($pages->pageCount > 1):?>
            <div class="clearfix"></div>
            <?= LinkPager::widget(['pagination' => $pages ]); ?>
        <?php endif; ?>

    </nav>
</div>