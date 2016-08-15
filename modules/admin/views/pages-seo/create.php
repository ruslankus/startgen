<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PagesSeoTrl */

$this->title = 'Create Pages Seo Trl';
$this->params['breadcrumbs'][] = ['label' => 'Pages Seo Trls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-seo-trl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
