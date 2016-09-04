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
                ]])->textInput(['placeholder' => Labels::t('name')]);  ?>

                <?= $form->field($order_model, 'phone',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->textInput(['placeholder' => Labels::t('phone')]);  ?>

                <?php $visit_day = !empty($order_model->visit_date) ? date('d.m.Y',strtotime($order_model->visit_date)) : ''; ?>
                <?= $form->field($order_model, 'visit_date',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->textInput(['placeholder' => Labels::t('visit_date'), 'id' => 'visit-date', 'value' => $visit_day ]);  ?>


                <?= $form->field($order_model, 'car_id',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-6'
                ]])->dropdownList(
                    CarList::find()->select(['name', 'id'])->indexBy('id')->column(),
                    ['prompt'=> Labels::t('select_car')]

                )  ?>


                <?= $form->field($order_model, 'car_year',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => Labels::t('car_year')]);  ?>

                <?= $form->field($order_model, 'engine_power',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => Labels::t('engine_power')]);  ?>


                <?= $form->field($order_model, 'engine_volume',['options' => [
                    'class' => 'form-group col-xs-12 col-sm-4'
                ]])->textInput(['placeholder' => Labels::t('engine_volume')]);  ?>



                <?= $form->field($order_model, 'problem_description',['options' => [
                    'class' => 'form-group col-xs-12 '
                ]])->textarea(['placeholder' => Labels::t('problem_description')]);  ?>


            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?= Labels::t('close')?></button>
            <button type="submit" class="btn btn-primary" id="send"><?= Labels::t('send')?></button>
        </div>

    <?php ActiveForm::end();?>

</div>