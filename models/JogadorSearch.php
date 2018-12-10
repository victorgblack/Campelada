<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jogador;

/**
 * JogadorSearch represents the model behind the search form of `app\models\Jogador`.
 */
class JogadorSearch extends Jogador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'equipe_nome'], 'safe'],
            [['Id_Jogador', 'pontuacao_jogador'], 'integer'],
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
        $query = Jogador::find();

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
            'Id_Jogador' => $this->Id_Jogador,
            'pontuacao_jogador' => $this->pontuacao_jogador,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'equipe_nome', $this->equipe_nome]);

        return $dataProvider;
    }
}
