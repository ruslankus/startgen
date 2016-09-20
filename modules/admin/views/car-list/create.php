<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CarList */

$this->title = 'Create Car List';
$this->params['breadcrumbs'][] = ['label' => 'Car Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
