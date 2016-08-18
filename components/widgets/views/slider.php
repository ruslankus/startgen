<?php
    use yii\helpers\Url;
    use app\models\Labels;
    use app\models\Languages;

$lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>
<div class="image-slider">

    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($sliders_array as $id => $slide):

                $active = (0 == $id)? 'active' : '';

            ?>
                <li data-target="#carousel" data-slide-to="<?= $id?>" class="<?= $active?>"></li>
             <?php endforeach; ?>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">


            <?php foreach ($sliders_array as $id => $slide):

                $active = (0 == $id)? 'active' : '';
                $content = array_shift($slide['content']);
            ?>

            <div class="item <?= $active ?>">

                <div class="item-inner" style="background-image: url('<?= Url::to(["/images/sliders/{$slide['img']}" ],true)?>');">
                    <div class="promo-section">
                        <div class="container">
                            <h2><?= $content['title'] ?></h2>
                            <p> <?= $content['text']?> </p>

                            <a href="<?= Url::to(['orders/index', 'language' => $lang_prefix ])?>" class="book-apm">
                                <?= Labels::t('make appointent') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

    </div>
</div>