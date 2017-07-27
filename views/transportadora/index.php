<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportadoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transportadoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportadora-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h4>CRUD de transportadora com nome e cidade</h4>
    <p>
        <?= Html::a('Novo Registro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nome',
            'cidade',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>[ 'style'=>'width: 100px'],
            ],
        ],
    ]); ?>
</div>
