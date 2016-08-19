<?php
    use yii\helpers\Html;
    use app\assets\FrontAsset;
    use app\components\widgets\LogoWidget;
    use app\components\widgets\LangWidget;
    use app\components\widgets\MenuWidget;
    use app\components\widgets\SliderWidget;
    use app\components\widgets\FooterWidget;


    FrontAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>


    <title><?= Html::encode($this->title) ?></title>
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>


    <?php $this->head() ?>


</head>
<body>
<?php $this->beginBody() ?>
<!--start-wrap-->
<div class="header">
    <div class="container">
        <!--start-header-->
        <!--start-logo-->

        <?= LogoWidget::widget();?>


        <!--End-logo-->
        <!--start-top-nav-->
        <div class="top-search-social-nav">
            <?= LangWidget::widget(); ?>
        </div>
        <div class="clearfix"> </div>
        <!--End-top-nav-->
    </div>
</div>
<!--End-header-->


<?= MenuWidget::widget(['page_label' => $this->params['page_label']]); ?>


<?php if(!empty($this->params['slider'])):?>
<!--start-image-slider-->
<?= SliderWidget::widget();?>
<!--End-image-slider-->
<?php endif; ?>

<div class="content">
    <div class="container">

        <?= $content;  ?>

    </div><!--/ container -->
</div>


<?= FooterWidget::widget(); ?>



<div class="copy-right">
    <p>&copy <?= date('Y') ?> StartMobile | Design by <a href="http://prophp.eu/">prophp</a></p>
</div>


<div id="modal-holder">

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <!-- modal goes here -->


    </div>

</div><!--/modal-holder -->

<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0); }, false);

    function hideURLbar(){
        window.scrollTo(0,1);
    }
</script>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>