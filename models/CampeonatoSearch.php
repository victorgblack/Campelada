<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Campeonato;

/**
 * CampeonatoSearch represents the model behind the search form of `app\models\Campeonato`.
 */
class CampeonatoSearch extends Campeonato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcampeonato', 'usuario_idusuario', 'qtdEquipe', 'qtdGrupo'], 'integer'],
            [['nome', 'modalidade', 'formato', 'qtdEquipeGrupo'], 'safe'],
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

    public function listByUser($id) {
        return self::find()
            ->where(['usuario_idusuario'=>$id])
            ->orderBy('nome ASC')
            ->all();
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
        $query = Campeonato::find();

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
            'idcampeonato' => $this->idcampeonato,
            'usuario_idusuario' => $this->usuario_idusuario,
            'qtdEquipe' => $this->qtdEquipe,
            'qtdGrupo' => $this->qtdGrupo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'modalidade', $this->modalidade])
            ->andFilterWhere(['like', 'formato', $this->formato])
            ->andFilterWhere(['like', 'qtdEquipeGrupo', $this->qtdEquipeGrupo]);

        return $dataProvider;
    }
}
