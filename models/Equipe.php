<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipe".
 *
 * @property int $idequipe
 * @property string $nome
 * @property int $vitoria_equipe
 * @property int $derrota_equipe
 * @property int $empate_equipe
 * @property int $saldo_equipe
 * @property int $aproveitamento_equipe
 *
 * @property EquipeHasGrupo[] $equipeHasGrupos
 * @property Grupo[] $grupoIdgrupos
 * @property Jogador[] $jogadors
 * @property Jogo[] $jogos
 * @property Jogo[] $jogos0
 */
class Equipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['vitoria_equipe', 'derrota_equipe', 'empate_equipe', 'saldo_equipe', 'aproveitamento_equipe'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['nome'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idequipe' => Yii::t('app', 'Idequipe'),
            'nome' => Yii::t('app', 'Nome'),
            'vitoria_equipe' => Yii::t('app', 'Vitoria Equipe'),
            'derrota_equipe' => Yii::t('app', 'Derrota Equipe'),
            'empate_equipe' => Yii::t('app', 'Empate Equipe'),
            'saldo_equipe' => Yii::t('app', 'Saldo Equipe'),
            'aproveitamento_equipe' => Yii::t('app', 'Aproveitamento Equipe'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeHasGrupos()
    {
        return $this->hasMany(EquipeHasGrupo::className(), ['equipe_idequipe' => 'idequipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoIdgrupos()
    {
        return $this->hasMany(Grupo::className(), ['idgrupo' => 'grupo_idgrupo'])->viaTable('equipe_has_grupo', ['equipe_idequipe' => 'idequipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogadors()
    {
        return $this->hasMany(Jogador::className(), ['equipe_idequipe' => 'idequipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogos()
    {
        return $this->hasMany(Jogo::className(), ['equipe_a' => 'nome']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogos0()
    {
        return $this->hasMany(Jogo::className(), ['equipe_b' => 'nome']);
    }
}
