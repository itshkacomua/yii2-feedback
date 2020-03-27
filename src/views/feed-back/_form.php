<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model itshkacomua\feedback\models\FeedBack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feed-back-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purpose_id')->dropDownList($model->purpose_list) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?if (!empty($model->id)):?>
        <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>
    <?endif;?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('content', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
