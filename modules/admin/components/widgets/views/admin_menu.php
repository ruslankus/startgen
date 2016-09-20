<?php
    use yii\helpers\Url;
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="<?= Url::home(true)?>" target="_blank">Starter Generator</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li class="<?= ('menu' == $current )? 'active' : '' ?> ">
                    <a href="<?= Url::to(['/admin/menu'])?>">Menu structure</a>
                </li>

                <li class="dropdown  <?= ('pages' == $current )? 'active' : '' ?> ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">
                        Pages
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?= Url::to(['/admin/pages']);?>">
                                Pages list
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Pages seo
                            </a>
                        </li>

                        <li>
                            <a href="">
                                Pages block list
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown  <?= ('head_slide' == $current )? 'active' : '' ?> ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">
                        Headlines & Sliders
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?= Url::to(['/admin/sliders'])?>">
                                Sliders
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/admin/headline'])?>">
                                Healines
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="dropdown  <?= ('product' == $current )? 'active' : '' ?> ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">
                        Product menu
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="<?= Url::to(['/admin/category'])?>">Category list</a>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/admin/product'])?>">Product list</a>
                        </li>
                    </ul>
                </li>


                <li class="<?= ('orders' == $current )? 'active' : '' ?> ">
                    <a href="<?= Url::toRoute(["/admin/orders"])?>">Orders</a>
                </li>



                <li class="dropdown  <?= ('settings' == $current )? 'active' : '' ?> ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        Settings list
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= Url::toRoute(['/admin/settings']) ?>">Main setting</a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute(['/admin/language']) ?>">Languages</a>
                        </li>

                        <li>
                            <a href="<?= Url::toRoute(['/admin/labels'])?>">Labels</a>
                        </li>

                        <li>
                            <a href="<?= Url::toRoute(['/admin/messages'])?>">Messages</a>
                        </li>

                        <li>
                            <a href="<?= Url::toRoute(['/admin/car-list'])?>">Car list</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Link</a> </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php $user =  Yii::$app->user->getIdentity(); ?>
                        Hello&nbsp;<?= $user->username ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= Url::to(['/admin/logout'])?>">Logout</a> </li>

                        <li class="divider"></li>
                        <li><a href="#">Separated link</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>