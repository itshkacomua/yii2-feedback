<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model itshkacomua\feedback\models\FeedBack */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Feed Backs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feed-back-view">

    <p>
        <?= Html::a(Yii::t('content', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'purpose_id',
            'name',
            'email:email',
            'subject',
            'content:ntext',
            'answer:ntext',
            'created_at',
            'user_update',
            'updated_at',
        ],
    ]) ?>

</div>
