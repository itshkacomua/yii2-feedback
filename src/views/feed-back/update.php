<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model itshkacomua\feedback\models\FeedBack */

$this->title = Yii::t('content', 'Update Feed Back: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Feed Backs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('content', 'Update');
?>
<div class="feed-back-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
