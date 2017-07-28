<?php


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\Transportadora;

/* @var $this yii\web\View */
/* @var $model app\models\TransportadoraCusto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transportadora-custo-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'custo_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custo_terra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custo_agua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custo_palete')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custo_quilo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transportadora_id')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
