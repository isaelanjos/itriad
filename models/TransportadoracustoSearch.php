<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransportadoraCusto;

/**
 * TransportadoracustoSearch represents the model behind the search form about `app\models\TransportadoraCusto`.
 */
class TransportadoracustoSearch extends TransportadoraCusto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transportadora_id'], 'integer'],
            [['custo_ar', 'custo_terra', 'custo_agua', 'custo_palete', 'custo_quilo'], 'number'],
            [['searchTransportadora'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TransportadoraCusto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('transportadora');

        $dataProvider->setSort([
            'attributes' => [
                'custo_ar',
                'custo_terra',
                'custo_agua',
                'custo_palete',
                'custo_quilo',
                'searchTransportadora'=> [
                    'asc' => ['transportadora.nome'=>SORT_ASC],
                    'desc' => ['transportadora.nome'=>SORT_DESC],
                ],
            ],
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'custo_ar' => $this->custo_ar,
            'custo_terra' => $this->custo_terra,
            'custo_agua' => $this->custo_agua,
            'custo_palete' => $this->custo_palete,
            'custo_quilo' => $this->custo_quilo,
            'transportadora_id' => $this->transportadora_id,
        ]);

        $query->andFilterWhere(['like', 'transportadora.nome', $this->searchTransportadora]);

        return $dataProvider;
    }
}
