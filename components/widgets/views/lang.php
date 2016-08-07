<?php
    use yii\helpers\Url;
?>
<ul>

    <?php foreach ($langs_array as $l_array):?>
        <?php if($l_array['prefix'] == $current_lang_array['prefix']):?>
            <?php continue; ?>
        <?php else:?>
            <li>
                <a href="<?= Url::current(['language' => $l_array['prefix'] ],true)?>">
                    <?= strtoupper($l_array['prefix']); ?>
                </a>
            </li>
        <?php endif;?>
    <?php endforeach;?>
</ul>