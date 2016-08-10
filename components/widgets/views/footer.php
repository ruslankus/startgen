<?php use app\models\Settings; ?>
<footer class="footer">
    <div class="container">
        <div class="col-xs-12 col-sm-6 footer-grid">
            <h3>
                <img src="/images/phone_call.svg" width="30" height="30">
                <?= Settings::getMap('mob_phone'); ?>
            </h3>
        </div>
        <div class="col-xs-12 col-sm-6 footer-grid">
            <h3>
                <img src="/images/address_map.svg" width="30" height="30">
                <?= Settings::getMap('city')?> <?= Settings::getMap('street')?> <?= Settings::getMap('house')?>
            </h3>
        </div>

        <div class="clearfix"> </div>
    </div>
</footer>