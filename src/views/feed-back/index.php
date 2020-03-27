<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel itshkacomua\feedback\models\FeedBackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('content', 'Feed Backs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feed-back-index">
    <p>
        <?= Html::a(Yii::t('app', 'Create Task Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'purpose_id',
            'name',
            'email:email',
            'subject',
            //'content:ntext',
            //'answer:ntext',
            'created_at:date',
            'user_update',
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
