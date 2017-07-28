<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransportadoraCusto */

$this->title = 'Custo da Transportadora: '.$model->transportadora->nome;
$this->params['breadcrumbs'][] = ['label' => 'Custos da Transportadora', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->transportadora->nome;
?>
<div class="transportadora-custo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'custo_ar',
            'custo_terra',
            'custo_agua',
            'custo_palete',
            'custo_quilo',
//            'transportadora_id',
        ],
    ]) ?>


    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirmar a exclusão deste item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
