<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jogo;

/**
 * JogoSearch represents the model behind the search form of `app\models\Jogo`.
 */
class JogoSearch extends Jogo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idjogo', 'grupo_idgrupo'], 'integer'],
            [['pontuacao_a', 'pontuacao_b', 'equipe_a', 'equipe_b'], 'safe'],
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
        $query = Jogo::find();

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
            'idjogo' => $this->idjogo,
            'grupo_idgrupo' => $this->grupo_idgrupo,
        ]);

        $query->andFilterWhere(['like', 'pontuacao_a', $this->pontuacao_a])
            ->andFilterWhere(['like', 'pontuacao_b', $this->pontuacao_b])
            ->andFilterWhere(['like', 'equipe_a', $this->equipe_a])
            ->andFilterWhere(['like', 'equipe_b', $this->equipe_b]);

        return $dataProvider;
    }
}
