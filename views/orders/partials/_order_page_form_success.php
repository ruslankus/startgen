<?php
use app\models\Messages;
use app\models\Languages;
use app\models\Labels;
use yii\helpers\Url;

$lang_prefix = Languages::getCurrentLanguage()['prefix'];

?>

<div style="height: 100%;">
    <table>
        <tr>
           <td style="vertical-align: middle" class="text-center">

               <p><?= Messages::t('bookikng sussess') ?></p>

               <a href="<?= Url::toRoute(['page/view','language' => $lang_prefix, 'id' => 3])  ?>" >
                   <?= Labels::t('refresh'); ?>
               </a>

           </td>
        </tr>
    </table>
</div>
