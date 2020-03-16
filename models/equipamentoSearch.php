<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EQUIPAMENTO;

/**
 * equipamentoSearch represents the model behind the search form of `app\models\EQUIPAMENTO`.
 */
class equipamentoSearch extends EQUIPAMENTO
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EQUIPAMENTO_COD_PK', 'LOCAL_COD_FK'], 'integer'],
            [['EQUIPAMENTO_NOME', 'EQUIPAMENTO_NUM_SERIE'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = EQUIPAMENTO::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'EQUIPAMENTO_COD_PK' => $this->EQUIPAMENTO_COD_PK,
            'LOCAL_COD_FK' => $this->LOCAL_COD_FK,
        ]);

        $query->andFilterWhere(['like', 'EQUIPAMENTO_NOME', $this->EQUIPAMENTO_NOME])
            ->andFilterWhere(['like', 'EQUIPAMENTO_NUM_SERIE', $this->EQUIPAMENTO_NUM_SERIE]);

        return $dataProvider;
    }
}
