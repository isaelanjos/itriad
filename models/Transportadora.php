<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transportadora".
 *
 * @property integer $id
 * @property string $nome
 * @property string $cidade
 *
 * @property TransportadoraCusto[] $transportadoraCustos
 */
class Transportadora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transportadora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'cidade'], 'required'],
            [['nome', 'cidade'], 'string', 'max' => 45],
            [['nome'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cidade' => 'Cidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportadoraCustos()
    {
        return $this->hasMany(TransportadoraCusto::className(), ['transportadora_id' => 'id']);
    }
}
