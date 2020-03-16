<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ENTRADA;

/**
 * entradaSearch represents the model behind the search form of `app\models\ENTRADA`.
 */
class entradaSearch extends ENTRADA
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LOCAL_COD_FK', 'ENTRADA_COD_PK', 'EQUIPAMENTO_COD_FK'], 'integer'],
            [['ENTRADA_OCORRENCIA'], 'safe'],
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
        //$query = ENTRADA::find();
        $query = ENTRADA::find()->innerJoinWith('eQUIPAMENTOCODFK.lOCALCODFK', true); 
        $query->orderBy([
            //'ENTRADA_COD_PK' => SORT_ASC,
            'ENTRADA_COD_PK' => SORT_DESC,
         ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                // campo da tabela TB_LOCAL em que deve ser pesquisado através do relacionamento 'eQUIPAMENTOCODFK.lOCALCODFK'.
                'attributes' => ['LOCAL_COD_PK'], 
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ENTRADA_COD_PK' => $this->ENTRADA_COD_PK,
            'EQUIPAMENTO_COD_FK' => $this->EQUIPAMENTO_COD_FK,
            'LOCAL_COD_PK' => $this->LOCAL_COD_FK,//Campo avulso deve ser declaro no model ENTRADA [ public $LOCAL_COD_FK; ]
        ]);

        $query->andFilterWhere(['like', 'ENTRADA_OCORRENCIA', $this->ENTRADA_OCORRENCIA]);

        return $dataProvider;
    }
}
