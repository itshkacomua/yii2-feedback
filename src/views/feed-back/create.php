<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model itshkacomua\feedback\models\FeedBack */

$this->title = Yii::t('content', 'Create Feed Back');
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Feed Backs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feed-back-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
