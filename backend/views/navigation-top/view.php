<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\fragments\NavigationTop */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/admin', 'Navigation Tops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-top-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app/admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app/admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app/admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parentId',
            'url:url',
            'title',
            'orderByNum',
            'status',
        ],
    ]) ?>

</div>
