<?php

use app\models\Produto;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h4>CRUD de Produtos</h4>

    <p>
        <?= Html::a('Novo Registro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Modelo',
                'attribute' => 'modelo',
            ],
            [
                'label' => 'Preço Und',
                'attribute' => 'preco',
                'format' => 'currency',
            ],
            [
                'label' => 'Cor',
                'attribute' => 'cor',
                'contentOptions'=>[ 'style'=>'width: 100px'],
                'filter'=>ArrayHelper::map(Produto::find()->asArray()->all(), 'cor', 'cor')
            ],
            'descricao',
            [
                'label' => 'Peso',
                'attribute' => 'peso',
            ],
            [
                'label' => 'Custo do Transporte',
                'attribute' => 'custo_transporte',
                'format' => 'currency',
            ],

            [
                'label' => 'Max por Palete',
                'attribute' => 'max_item_palete',
                'format' => 'integer',
            ],
            //

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>[ 'style'=>'width: 100px'],
            ],
        ],
    ]); ?>
</div>
