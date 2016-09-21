<?php
    use app\models\Labels;
    use yii\helpers\Html;
    use yii\widgets\Breadcrumbs;
    use app\models\Languages;


$lang_prefix = Languages::getCurrentLanguage()['prefix'];

$this->params['breadcrumbs'][] = ['label' => Labels::t('catalog'), 'url' => ['index', 'language' => $lang_prefix ]];
$this->params['breadcrumbs'][] = ['label' => $product->category->content[0]->title,
    'url' => ['category', 'id' => $product->category->id , 'language' => $lang_prefix ]];
$this->params['breadcrumbs'][] = $product->name;

$image_path = !empty($product->old_id)? "/images/products/{$product->old_id}/"
    : "/images/products/new/" ;

?>
<div class="services category">

    <div>
        <?= Breadcrumbs::widget([
            'homeLink'=>false ,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

    </div>

    <h4>Product <?= $content['product_title']; ?>  </h4><h5> </h5><div class="clearfix"> </div>



    <div class="section product clearfix">
        <div class="img-holder col-xs-12 col-sm-7 col-md-6">
            <?= Html::img("{$image_path}original_{$product->img}", ['alt' => $product->name]);?>


        </div>

        <div class="product-info col-xs-12 col-sm-5 col-md-6">
            <h2><?= $product->name?></h2>

            <p><strong>Catalog number:</strong> <?= $product->catalog_number ?></p>

            <p><strong>Part number: </strong><?= $product->part_number ?> </p>

            <p><strong>Auto list:</strong> <?= $product->text?> </p>
        </div>
    </div>

    <div class="product-description">
        <?= $content['product_description'];?>
    </div>

</div>