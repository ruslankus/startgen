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


<div class="clear"></div>

<?= $form->field($order_model, 'problem_description',[

    'template' => '<div>{label}</div> <div>{input}{error}</div>',
    'options' => [
        'class' => 'form-group col-xs-12 '
    ]])->textarea(['placeholder' => 'Problem description']);  ?>


<div class="clearfix">
    <div>
        <input type="submit" value="Submit" id="big-form">
    </div>
</div>

<?php $form->end() ?>