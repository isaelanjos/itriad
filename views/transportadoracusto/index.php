<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportadoracustoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custos da Transportadora';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportadora-custo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h4>CRUD de custo do transporte por transportadora e meio de transporte</h4>

    <p>
        <?= Html::a('Novo Registro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',

            [
                'label' => 'Transportadora',
                'attribute' => 'searchTransportadora',
                'value' => 'transportadora.nome',
            ],

            'custo_ar',
            'custo_terra',
            'custo_agua',
            'custo_palete',
            // 'transportadora_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>[ 'style'=>'width: 100px'],
            ],
        ],
    ]); ?>
</div>
