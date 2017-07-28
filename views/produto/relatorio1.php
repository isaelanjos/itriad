<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Produto;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Listagem de produtos com modelo, preço, cor, descrição e custo de transporte </h4>
    <hr>
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
                'label' => 'Preço',
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
                'label' => 'Custo de Transporte',
                'attribute' => 'custo_transporte',
                'format' => 'currency',
            ],
            [
                'label' => 'Max por Palete',
                'attribute' => 'max_item_palete',
            ],
            [
                'label' => '',
                'format' => 'raw',
                'value' => function ($dataProvider) {
                    return Html::a('Adicionar', './?r=carrinho/adicionar&id='.$dataProvider->id);
                },
            ],
            // 'max_item_palete',

        ],
    ]); ?>
</div>
