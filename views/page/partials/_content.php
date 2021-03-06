<?php

use app\models\Labels;
use yii\helpers\Url;
use app\models\Languages;
use app\models\Messages;

$lang_prefix = Languages::getCurrentLanguage()['prefix'];

$trl_content = array_shift($block['trl']);

$content = !empty($trl_content['content']) ? $trl_content['content'] : 'NO TRANSLATION';


?>
<div class="description">
    <?= $content ?>
</div>
<div class="big-button">

    <div class="big-b-text">
        <p><?= Messages::t('book repair') ?></p>

    </div>
    <div class="big-b-btn">
        <a href="<?= Url::to(['orders/index', 'language' => $lang_prefix ])?>" data-lang="<?= $lang_prefix ?>" class="book-apm">
            <?= Labels::t('make appointent') ?>
        </a>
    </div>
    <div class="clearfix"> </div>
</div>