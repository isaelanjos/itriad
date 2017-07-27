<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransportadoracustoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transportadora-custo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'custo_ar') ?>

    <?= $form->field($model, 'custo_terra') ?>

    <?= $form->field($model, 'custo_agua') ?>

    <?= $form->field($model, 'custo_palete') ?>

    <?php // echo $form->field($model, 'transportadora_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
