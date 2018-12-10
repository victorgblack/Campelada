<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $idgrupo
 * @property string $nome
 * @property int $campeonato_idcampeonato
 *
 * @property EquipeHasGrupo[] $equipeHasGrupos
 * @property Equipe[] $equipeNomes
 * @property Campeonato $campeonatoIdcampeonato
 * @property Jogo[] $jogos
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['campeonato_idcampeonato'], 'required'],
            [['campeonato_idcampeonato'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['campeonato_idcampeonato'], 'exist', 'skipOnError' => true, 'targetClass' => Campeonato::className(), 'targetAttribute' => ['campeonato_idcampeonato' => 'idcampeonato']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgrupo' => Yii::t('app', 'Idgrupo'),
            'nome' => Yii::t('app', 'Nome'),
            'campeonato_idcampeonato' => Yii::t('app', 'Campeonato Idcampeonato'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeHasGrupos()
    {
        return $this->hasMany(EquipeHasGrupo::className(), ['grupo_idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeId()
    {
        return $this->hasMany(Equipe::className(), ['idequipe' => 'equipe_idequipe'])->viaTable('equipe_grupo', ['grupo_idgrupo' => 'idgrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampeonatoIdcampeonato()
    {
        return $this->hasOne(Campeonato::className(), ['idcampeonato' => 'campeonato_idcampeonato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJogos()
    {
        return $this->hasMany(Jogo::className(), ['grupo_idgrupo' => 'idgrupo']);
    }
}
