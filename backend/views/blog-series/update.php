<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\blog\BlogSeries */

$this->title = Yii::t('app/admin', 'Update Blog Series: {nameAttribute}', [
    'nameAttribute' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/admin', 'Blog Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/admin', 'Update');
?>
<div class="blog-series-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
