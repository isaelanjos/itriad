<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $id
 * @property string $descricao
 * @property string $modelo
 * @property string $cor
 * @property double $peso
 * @property string $preco
 * @property string $custo_transporte
 * @property integer $max_item_palete
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'modelo', 'cor', 'peso', 'preco', 'custo_transporte', 'max_item_palete'], 'required'],
            [['peso', 'preco', 'custo_transporte'], 'number'],
            [['max_item_palete'], 'integer'],
            [['descricao', 'modelo', 'cor'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'modelo' => 'Modelo',
            'cor' => 'Cor',
            'peso' => 'Peso',
            'preco' => 'Preço',
            'custo_transporte' => 'Custo de Transporte',
            'max_item_palete' => 'Max Itens por Palete',
        ];
    }
}
