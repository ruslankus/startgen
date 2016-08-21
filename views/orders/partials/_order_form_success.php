<?php
    use yii\jui\DatePicker;
    use yii\bootstrap\ActiveForm;
    use app\models\CarList;
    use yii\helpers\Url;
    use app\models\Languages;
    use app\models\Messages;

    $lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Book repair</h4>
        </div>

        <div class="modal-body">
            <div class="clearfix col-xs-12">
                <p><?= Messages::t('bookikng sussess') ?></p>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    </div>

</div>