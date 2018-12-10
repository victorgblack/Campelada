<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipe;

/**
 * EquipeSearch represents the model behind the search form of `app\models\Equipe`.
 */
class EquipeSearch extends Equipe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idequipe', 'vitoria_equipe', 'derrota_equipe', 'empate_equipe', 'saldo_equipe', 'aproveitamento_equipe'], 'integer'],
            [['nome'], 'safe'],
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

    public function listAll() {
        return self::find()->orderBy('nome ASC')->all();
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
        $query = Equipe::find();

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
            'idequipe' => $this->idequipe,
            'vitoria_equipe' => $this->vitoria_equipe,
            'derrota_equipe' => $this->derrota_equipe,
            'empate_equipe' => $this->empate_equipe,
            'saldo_equipe' => $this->saldo_equipe,
            'aproveitamento_equipe' => $this->aproveitamento_equipe,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
