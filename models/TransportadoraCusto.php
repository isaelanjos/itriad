<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transportadora_custo".
 *
 * @property integer $id
 * @property string $custo_ar
 * @property string $custo_terra
 * @property string $custo_agua
 * @property string $custo_palete
 * @property string $custo_quilo
 * @property integer $transportadora_id
 *
 * @property Transportadora $transportadora
 */
class TransportadoraCusto extends \yii\db\ActiveRecord
{
    public $searchTransportadora;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transportadora_custo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custo_ar', 'custo_terra', 'custo_agua', 'custo_palete', 'custo_quilo', 'transportadora_id'], 'required'],
            [['custo_ar', 'custo_terra', 'custo_agua', 'custo_palete', 'custo_quilo'], 'number'],
            [['transportadora_id'], 'integer'],
            [['transportadora_id'], 'unique'],
            [['transportadora_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transportadora::className(), 'targetAttribute' => ['transportadora_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'custo_ar' => 'Custo Ar',
            'custo_terra' => 'Custo Terra',
            'custo_agua' => 'Custo Agua',
            'custo_palete' => 'Custo Palete',
            'custo_quilo' => 'Custo Quilo',
            'transportadora_id' => 'Transportadora ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportadora()
    {
        return $this->hasOne(Transportadora::className(), ['id' => 'transportadora_id']);
    }
}
