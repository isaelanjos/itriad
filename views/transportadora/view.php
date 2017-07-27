<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transportadora */

$this->title = 'Transportadora: '.$model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Transportadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nome;
?>
<div class="transportadora-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'nome',
            'cidade',
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
