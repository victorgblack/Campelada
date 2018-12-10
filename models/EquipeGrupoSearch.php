<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquipeGrupo;

/**
 * EquipeGrupoSearch represents the model behind the search form of `app\models\EquipeGrupo`.
 */
class EquipeGrupoSearch extends EquipeGrupo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipe_idequipe'],'safe'],
            [['equipe_idequipe','grupo_idgrupo', 'vitoria', 'derrota', 'empate', 'saldo', 'aproveitamento'], 'integer'],
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
        $query = EquipeGrupo::find();

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
            'equipe_idequipe' => $this->equipe_idequipe,
            'grupo_idgrupo' => $this->grupo_idgrupo,
            'vitoria' => $this->vitoria,
            'derrota' => $this->derrota,
            'empate' => $this->empate,
            'saldo' => $this->saldo,
            'aproveitamento' => $this->aproveitamento,
        ]);

        //$query->andFilterWhere(['like', 'equipe_nome', $this->equipe_nome]);

        return $dataProvider;
    }
}
