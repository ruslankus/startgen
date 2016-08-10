<?php
    use app\models\Settings;
    use yii\web\View;
?>



<div class="contact">
    <div class="section group">


        <div class="col-md-4 col span_1_of_3">
            <div class="contact_info">
                <h3>FIND</h3><h5> </h5><div class="clearfix"> </div>
                <div class="map" id="map">
                    <!-- map place -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.8331047026895!2d25.287445015886135!3d54.712559380287956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96b245aaa833%3A0xec3c1a810798ec9a!2sP.+Luk%C5%A1io+g.+16%2C+Vilnius+08222!5e0!3m2!1sru!2slt!4v1470775751033" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>


            <div class="company_address">
                <h3>Info</h3><h5> </h5><div class="clearfix"> </div>
                <p><?= Settings::getMap('street')?> <?= Settings::getMap('house')?>, <?= Settings::getMap('city')?></p>

                <p>LT</p>
                <p>Phone:<?= Settings::getMap('phone')?></p>
                <p>Mobile: <?= Settings::getMap('mob_phone')?></p>
                <p>Email: <span>
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
                <h3>CONTACT US</h3><h5> </h5><div class="clearfix"> </div>
                <form>
                    <div>
                        <span><label>NAME</label></span>
                        <span><input type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>E-MAIL</label></span>
                        <span><input type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>MOBILE</label></span>
                        <span><input type="text" class="textbox"></span>
                    </div>
                    <div>
                        <span><label>SUBJECT</label></span>
                        <span><textarea> </textarea></span>
                    </div>
                    <div>
                        <span><input type="submit" value="Submit"></span>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>