<?php
    use yii\helpers\Html;
    use app\assets\FrontAsset;
    use app\components\widgets\LogoWidget;
    use app\components\widgets\LangWidget;
    use app\components\widgets\MenuWidget;
    use app\components\widgets\SliderWidget;
    FrontAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
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


<?= MenuWidget::widget(); ?>

<!--start-image-slider-->
<?= SliderWidget::widget();?>
<!--End-image-slider-->

<div class="content">
    <div class="container">
        <div class="grids">
            <h4>What We Do</h4><h5> </h5><div class="clearfix"> </div>
            <div class="section group">

                <div class="col-md-3 we-do">
                    <div class="active-grid">
                        <h3>
                            <img src="images/diag_icon.svg" width="44" height="36" title="support" alt="">
                            Диагностика
                        </h3>
                        <p> Mūsų autoservisas teikia starterių ir generatorių patikros diagnostika. Bėndras irenginio
                            darbingumas nustatomas starterių ir generatorių tikrinimo stendo pagalba, kuria lydi pilnas
                            irenginio išardymas ir kiekvieno mazgo atskirai patikrinimas. Šis patikros budas, leidzia
                            nustatyti konkretų gėdima, jo atsiradimo priežastis, ivertintį bendra mazgų buklę ir taisymo
                            tikslingumą.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 we-do">
                    <div class="active-grid">
                        <h3>
                            <img src="images/repair_icon.svg" width="44" height="36" title="Destinations" alt="">
                            Rėmontas
                        </h3>
                        <p>Remontuojame STARTERIUS, GENERATORIUS lengviesiems automobiliams, vilkikams, autobusams,
                            žemės ūkio, jūrinės paskirties, sunkiąjai technikai, krautuvams, keltuvams, kranams,
                            įvairiai spec. technikai.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 we-do">
                    <div class="active-grid">
                        <h3>
                            <img src="images/sales_icon.svg" width="44" height="36" title="Events" alt="">
                            Pardavimas
                        </h3>
                        <p>
                            Kokybiškos pasaulinių gamintojų STARTERIŲ, GENERATORIŲ dalys (Bosch, Valeo, Prestolite, Magneti
                            Marelli, Iskra, Delco Remy, Visteon, Cargo, Transpo, Mobiletron, Mitsubishi, Hitachi ir kt.)
                        </p>
                    </div>
                </div>

                <div class="col-md-3 we-do">
                    <div class="active-grid">
                        <h3>
                            <img src="images/consult_icon.svg" width="44" height="36" title="Plans" alt="">
                            Konsūltavimas
                        </h3>
                        <p>
                            Mūsų specialistai,padęs jums surastį tinkantį dėtale, pagal starterio, generatoriaus numerį,
                            arba pagal automobilio duomenis.
                        </p>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>


        <div class="description">
            <p>
                Компания "Стартер-Генератор", начавшая свою деятельность в 1997 г. в г.Вильнюс, в настоящее время является одним из ведущих предприятий Литовской Республики, специализирующихся на продаже, ремонте и восстановлении стартеров и генераторов для всех видов автомобилей, включая грузовые автомобили, автобусы и спецтехнику. Мы предлагаем также широкий ассортимент комплектующих для ремонта стартеров и генераторов.
                Высококвалифицированный персонал проведет профессиональную диагностику и ремонт любой сложности в сжатые сроки. Для автосервисов и автотранспортных предприятий предоставляются скидки и особые условия.
                Мы активно развиваемся, разрабатывая новые ассортиментные позиции и расширяя рынок своей деятельности. Мы обеспечиваем максимальное наличие и предлагаем лучшее качество по лучшим ценам.С начала 2007года,наша компания представляет свою продукцию на российском рынке.

            </p>
        </div>
        <div class="big-button">

            <div class="big-b-text">
                <p>Lorem ipsum dolor sit amet.</p>
                <span>comvoluptate velit esse cillum dolore eu fugiat....</span>
            </div>
            <div class="big-b-btn">
                <a href="#">Book appointment</a>
            </div>
            <div class="clearfix"> </div>
        </div>





        <div class="recent-places">

            <h4>Our products</h4>
            <h5> </h5><div class="clearfix"> </div>
            <div class="col-md-3 holder smooth">
                <img src="images/catalog1.jpg" alt="Web Tutorial Plus - Demo">
                <div class="go-top">
                    <h3>Image Description</h3>
                    <p>
                        This is the description of this image. You may use.
                    </p>
                    <a href="#">ReadMore</a>
                </div>
            </div>
            <div class="col-md-3 holder smooth">
                <img src="images/catalog2.jpg" alt="Web Tutorial Plus - Demo">
                <div class="go-top">
                    <h3>Image Description</h3>
                    <p>
                        This is the description of this image. You may use.
                    </p>
                    <a href="#">ReadMore</a>
                </div>
            </div>
            <div class="col-md-3 holder smooth">
                <img src="images/catalog3.jpg" alt="Web Tutorial Plus - Demo">
                <div class="go-top">
                    <h3>Image Description</h3>
                    <p>
                        This is the description of this image. You may use.
                    </p>
                    <a href="#">ReadMore</a>
                </div>
            </div>
            <div class="col-md-3 holder smooth last-grid">
                <img src="images/catalog4.jpg" alt="Web Tutorial Plus - Demo">
                <div class="go-top">
                    <h3>Image Description</h3>
                    <p>
                        This is the description of this image. You may use.
                    </p>
                    <a href="#">ReadMore</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <div class="col-xs-12 col-sm-6 footer-grid">
            <h3>
                <img src="images/phone_call.svg" width="30" height="30">
                +370 374 56464
            </h3>
        </div>
        <div class="col-xs-12 col-sm-6 footer-grid center-grid">
            <h3>
                <img src="images/address_map.svg" width="30" height="30">
                Vilnius, P.Liuksio 18, LT-3002
            </h3>
        </div>

        <div class="clearfix"> </div>
    </div>
</footer>



<div class="copy-right">
    <p>&copy; 2016 StartMobile | Design by <a href="http://prophp.eu/">prophp</a></p>
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
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/common.js"></script>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>