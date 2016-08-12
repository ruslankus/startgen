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
        <div class="modal-dialog" role="document">
            <form method="post" action="#" class="modal-content">

                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, suscipit!</p>

                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="phone">
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="exampleInputEmail1">Data</label>
                        <input type='text' class="form-control" id="exampleInputEmail1" placeholder="Data">
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="avto">Avto</label>

                        <select class="form-control" id="avto">
                            <option>Audi</option>
                            <option>BMW</option>
                            <option>Nissan</option>
                            <option>Honda</option>
                            <option>Moskvich</option>
                        </select>
                    </div>

                    <div class="form-group col-xs-12">
                        <label for="avto">Proble description</label>

                        <textarea class="form-control" rows="3"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </form>

        </div>
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