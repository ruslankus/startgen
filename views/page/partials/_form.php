<?php
    use app\models\Settings;
    use yii\web\View;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use app\models\Languages;
    use app\models\Orders;
    use app\models\CarList;
    use app\models\Labels;

    $lang_prefix = Languages::getCurrentLanguage()['prefix'];
    $order_model = new Orders();
?>



<div class="contact">
    <div class="section group">


        <div class="col-md-4 col span_1_of_3">
            <div class="contact_info">
                <h3><?= Labels::t('find')?></h3><h5 class="<?= $lang_prefix ?>"> </h5><div class="clearfix"> </div>
                <div class="map" id="map">
                    <!-- map place -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.8331047026895!2d25.287445015886135!3d54.712559380287956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96b245aaa833%3A0xec3c1a810798ec9a!2sP.+Luk%C5%A1io+g.+16%2C+Vilnius+08222!5e0!3m2!1sru!2slt!4v1470775751033" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>


            <div class="company_address">
                <h3><?= Labels::t('info')?></h3><h5 class="<?= $lang_prefix?>"> </h5><div class="clearfix"> </div>
                <p><?= Settings::getMap('street')?> <?= Settings::getMap('house')?>, <?= Settings::getMap('city')?></p>


                <p> <?= Settings::getMap('post_code') ?>  </p>

                <p><?= Labels::t('phone')?>:<?= Settings::getMap('phone')?></p>
                <p><?= Labels::t('mobile')?>: <?= Settings::getMap('mob_phone')?></p>
                <p><?= Labels::t('email')?>: <span>
                        <a href="mailto:<?= Settings::getMap('email'); ?>">
                            <?= Settings::getMap('email')?>
                        </a>
                    </span>
                </p>
                <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
            </div>
        </div>

        <div class="col-md-8 col span_2_of_3">


            <div class="contact-form">
                <h3><?= Labels::t('contact_us')?></h3><h5 class="<?= $lang_prefix?>"> </h5>
                <div style="clear:both"></div>


                <div class="clearfix" id="form-holder">

                    <?php    $form = ActiveForm::begin([
                        'action' => Url::to(['/orders/form-order', 'language' => $lang_prefix]),
                        'id' => 'order-form',
                        'options' => [
                            'class' => 'clearfix'
                        ]

                    ]);

                    ?>




                    <?= $form->field($order_model, 'name',[
                        'template' => '<div>{label}</div> <div>{input}{error}</div>',
                        'options' => [
                        'class' => 'col-xs-12 col-sm-6'
                    ]])->textInput(['placeholder' => Labels::t('name') ,'class' => 'textbox' ]);  ?>


                    <?= $form->field($order_model, 'phone',[
                        'template' => '<div>{label}</div> <div>{input}{error}</div>',
                        'options' => [
                            'class' => 'col-xs-12 col-sm-6'
                    ]])->textInput(['placeholder' => Labels::t('phone') ,'class' => 'textbox' ]);  ?>

                    <div style="clear: both"></div>
                    <?= $form->field($order_model, 'visit_date',[
                        'template' => '<div>{label}</div> <div>{input}{error}</div>',
                        'options' => [
                            'class' => 'form-group col-xs-12 col-sm-6'
                    ]])->textInput(['placeholder' => Labels::t('visit_date'), 'id' => 'visit-date', 'class' => 'textbox' ]);  ?>


                    <?= $form->field($order_model, 'car_id',[
                        'template' => '<div>{label}</div> <div>{input}{error}</div>',
                        'options' => [
                        'class' => 'form-group col-xs-12 col-sm-6'
                    ]])->dropdownList(
                        CarList::find()->select(['name', 'id'])->indexBy('id')->column(),
                        ['prompt'=> Labels::t('select_car'), 'class' => 'textbox' ]

                    ); ?>

                    <div style="clear: both"></div>

                    <?= $form->field($order_model, 'car_year',['options' => [
                        'class' => 'form-group col-xs-12 col-sm-4'
                    ]])->textInput(['placeholder' => Labels::t('car_year'), 'class' => 'textbox']);  ?>

                    <?= $form->field($order_model, 'engine_power',['options' => [
                        'class' => 'form-group col-xs-12 col-sm-4'
                    ]])->textInput(['placeholder' => 'XXX', 'class' => 'textbox']);  ?>


                    <?= $form->field($order_model, 'engine_volume',['options' => [
                        'class' => 'form-group col-xs-12 col-sm-4'
                    ]])->textInput(['placeholder' => 'XXX', 'class' => 'textbox']);  ?>



                    <div style="clear: both"></div>

                    <?= $form->field($order_model, 'problem_description',[

                        'template' => '<div>{label}</div> <div>{input}{error}</div>',
                        'options' => [
                        'class' => 'form-group col-xs-12 '
                    ]])->textarea(['placeholder' => Labels::t('problem_description')]);  ?>


                    <div class="clearfix button-holder">
                        <div>
                            <input type="submit" value="<?= Labels::t('submit')?>" id="big-form">
                        </div>
                    </div>

                    <?php $form->end() ?>
                </div>
            </div>



        </div>
    </div>
</div>