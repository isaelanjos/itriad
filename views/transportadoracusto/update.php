<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransportadoraCusto */

$this->title = 'Atualização de Custos de: ' . $model->transportadora->nome;
$this->params['breadcrumbs'][] = ['label' => 'Transportadora Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transportadora->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="transportadora-custo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
