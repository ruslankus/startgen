<?php
    use yii\jui\DatePicker;
    use yii\bootstrap\ActiveForm;
    use app\models\CarList;
    use yii\helpers\Url;
    use app\models\Languages;
    use app\models\Messages;
    use app\models\Labels;

    $lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>

<div class="modal-dialog" role="document">


    <?php    $form = ActiveForm::begin([
        'action' => Url::to(['make-order', 'language' => $lang_prefix]),
        'id' => 'order-form',
        'options' => [
            'class' => 'modal-content'

        ],

    ]);

    ?>


        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?= Labels::t('contact_us')?></h4>
        </div>

        <div class="modal-body">
            <div class="clearfix col-xs-12">
                <p><?= Messages::t('make appointent') ?></p>
            </div>

            <div class="clearfix">


                <?= $form->field($order_model, 'name',['options' => [
                   'class' => 'form-group col-xs-12 col-sm-6'
                ]])->textInput(['placeholder' => 'Your name']);  ?>

                <?= $form->field($order_model, 'phone',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->textInput(['placeholder' => 'Your phone']);  ?>

                <?= $form->field($order_model, 'visit_date',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->textInput(['placeholder' => 'Booking date', 'id' => 'visit-date']);  ?>


                <?= $form->field($order_model, 'car_id',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->dropdownList(
                    CarList::find()->select(['name', 'id'])->indexBy('id')->column(),
                    ['prompt'=>'Select car']

                )  ?>


                <?= $form->field($order_model, 'car_year',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => 'Car year']);  ?>

                <?= $form->field($order_model, 'engine_power',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => 'Kw']);  ?>


                <?= $form->field($order_model, 'engine_volume',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => 'cm']);  ?>



                <?= $form->field($order_model, 'problem_description',['options' => [
                    'class' => 'form-group col-xs-12 '
                ]])->textarea(['placeholder' => 'Problem description']);  ?>


            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="send">Send</button>
        </div>

    <?php ActiveForm::end();?>

</div>