<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use app\models\Languages;

    $lang_prefix  = Languages::getCurrentLanguage()['prefix'];
?>
<div class="recent-places">

    <h4>Our products</h4>
    <h5> </h5><div class="clearfix"> </div>

    <?php foreach ($category_array as $cat):

        $content = array_shift($cat['content']);
    ?>

    <div class="col-md-3 holder smooth">
        <?= Html::img("@web/images/{$cat['img']}", ['alt' => $content['title']]) ?>
        <div class="go-top">
            <h3><?= strtoupper($content['title']);?></h3>
            <p>
                <?= $content['snippet']?>
            </p>
            <a href="<?= Url::toRoute(['catalog/category', 'id' => $cat['id'], 'language' => $lang_prefix ])?>">
                ReadMore
            </a>
        </div>
    </div>

    <?php endforeach;?>




    <div class="clearfix"> </div>
</div>