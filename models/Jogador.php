<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogador".
 *
 * @property string $nome
 * @property int $Id_Jogador
 * @property int $pontuacao_jogador
 * @property string $equipe_nome
 *
 * @property Equipe $equipeNome
 */
class Jogador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jogador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'equipe_nome'], 'required'],
            [['pontuacao_jogador'], 'integer'],
            [['nome', 'equipe_nome'], 'string', 'max' => 45],
            [['equipe_nome'], 'exist', 'skipOnError' => true, 'targetClass' => Equipe::className(), 'targetAttribute' => ['equipe_nome' => 'nome']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => Yii::t('app', 'Nome'),
            'Id_Jogador' => Yii::t('app', 'Id  Jogador'),
            'pontuacao_jogador' => Yii::t('app', 'Pontuacao Jogador'),
            'equipe_nome' => Yii::t('app', 'Equipe Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeNome()
    {
        return $this->hasOne(Equipe::className(), ['nome' => 'equipe_nome']);
    }
}
