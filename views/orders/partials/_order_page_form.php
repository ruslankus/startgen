<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use app\models\Languages;
    use app\models\CarList;

    $lang_prefix = Languages::getCurrentLanguage()['prefix'];
?>


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
    ]])->textInput(['placeholder' => 'Your name' ,'class' => 'textbox' ]);  ?>


<?= $form->field($order_model, 'phone',[
    'template' => '<div>{label}</div> <div>{input}{error}</div>',
    'options' => [
        'class' => 'col-xs-12 col-sm-6'
    ]])->textInput(['placeholder' => 'Your name' ,'class' => 'textbox' ]);  ?>


    <div style="clear: both"></div>


<?= $form->field($order_model, 'visit_date',[
    'template' => '<div>{label}</div> <div>{input}{error}</div>',
    'options' => [
        'class' => 'form-group col-xs-12 col-sm-6'
    ]])->textInput(['placeholder' => 'Booking date', 'id' => 'visit-date', 'class' => 'textbox' ]);  ?>


<?= $form->field($order_model, 'car_id',[
    'template' => '<div>{label}</div> <div>{input}{error}</div>',
    'options' => [
        'class' => 'form-group col-xs-12 col-sm-6'
    ]])->dropdownList(
    CarList::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select car', 'class' => 'textbox' ]

); ?>


    <div style="clear: both"></div>

<?= $form->field($order_model, 'car_year',['options' => [
    'class' => 'form-group col-xs-12 col-sm-4'
]])->textInput(['placeholder' => 'Car year', 'class' => 'textbox']);  ?>

<?= $form->field($order_model, 'engine_power',['options' => [
    'class' => 'form-group col-xs-12 col-sm-4'
]])->textInput(['placeholder' => 'Kw', 'class' => 'textbox']);  ?>


<?= $form->field($order_model, 'engine_volume',['options' => [
    'class' => 'form-group col-xs-12 col-sm-4'
]])->textInput(['placeholder' => 'cm', 'class' => 'textbox']);  ?>



    <div style="clear: both"></div>

<?= $form->field($order_model, 'problem_description',[

    'template' => '<div>{label}</div> <div>{input}{error}</div>',
    'options' => [
        'class' => 'form-group col-xs-12 '
    ]])->textarea(['placeholder' => 'Problem description']);  ?>

    <div style="clear: both"></div>

    <div>
        <input type="submit" value="<?= \app\models\Labels::t('submit')?>" id="big-form" />
    </div>


<?php $form->end() ?>