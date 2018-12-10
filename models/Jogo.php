<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogo".
 *
 * @property int $idjogo
 * @property int $grupo_idgrupo
 * @property string $pontuacao_a
 * @property string $pontuacao_b
 * @property string $equipe_a
 * @property string $equipe_b
 *
 * @property Equipe $equipeA
 * @property Equipe $equipeB
 * @property Grupo $grupoIdgrupo
 */
class Jogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jogo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grupo_idgrupo'], 'integer'],
            [['pontuacao_a', 'pontuacao_b', 'equipe_a', 'equipe_b'], 'required'],
            [['pontuacao_a', 'pontuacao_b', 'equipe_a', 'equipe_b'], 'string', 'max' => 45],
            [['equipe_a'], 'exist', 'skipOnError' => true, 'targetClass' => Equipe::className(), 'targetAttribute' => ['equipe_a' => 'nome']],
            [['equipe_b'], 'exist', 'skipOnError' => true, 'targetClass' => Equipe::className(), 'targetAttribute' => ['equipe_b' => 'nome']],
            [['grupo_idgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['grupo_idgrupo' => 'idgrupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjogo' => Yii::t('app', 'Idjogo'),
            'grupo_idgrupo' => Yii::t('app', 'Grupo Idgrupo'),
            'pontuacao_a' => Yii::t('app', 'Pontuacao A'),
            'pontuacao_b' => Yii::t('app', 'Pontuacao B'),
            'equipe_a' => Yii::t('app', 'Equipe A'),
            'equipe_b' => Yii::t('app', 'Equipe B'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeA()
    {
        return $this->hasOne(Equipe::className(), ['nome' => 'equipe_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeB()
    {
        return $this->hasOne(Equipe::className(), ['nome' => 'equipe_b']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoIdgrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'grupo_idgrupo']);
    }
}
