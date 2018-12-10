<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipe_grupo".
 *
 * @property int $equipe_idequipe
 * @property int $grupo_idgrupo
 * @property int $vitoria
 * @property int $derrota
 * @property int $empate
 * @property int $saldo
 * @property int $aproveitamento
 *
 * @property Equipe $equipeIdequipe
 * @property Grupo $grupoIdgrupo
 */
class EquipeGrupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipe_grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipe_idequipe', 'grupo_idgrupo', 'vitoria', 'derrota', 'empate', 'saldo', 'aproveitamento'], 'required'],
            [['grupo_idgrupo', 'vitoria', 'derrota', 'empate', 'saldo', 'aproveitamento','equipe_idequipe'], 'integer'],
            [['vitoria'], 'unique'],
            [['derrota'], 'unique'],
            [['empate'], 'unique'],
            [['saldo'], 'unique'],
            [['aproveitamento'], 'unique'],
            [['equipe_idequipe', 'grupo_idgrupo'], 'unique', 'targetAttribute' => ['equipe_idequipe', 'grupo_idgrupo']],
            [['equipe_idequipe'], 'exist', 'skipOnError' => true, 'targetClass' => Equipe::className(), 'targetAttribute' => ['equipe_idequipe' => 'idequipe']],
            [['grupo_idgrupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['grupo_idgrupo' => 'idgrupo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equipe_idequipe' => Yii::t('app', 'Equipe Idequipe'),
            'grupo_idgrupo' => Yii::t('app', 'Grupo Idgrupo'),
            'vitoria' => Yii::t('app', 'Vitoria'),
            'derrota' => Yii::t('app', 'Derrota'),
            'empate' => Yii::t('app', 'Empate'),
            'saldo' => Yii::t('app', 'Saldo'),
            'aproveitamento' => Yii::t('app', 'Aproveitamento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipeId()
    {
        return $this->hasOne(Equipe::className(), ['nome' => 'equipe_idequipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoIdgrupo()
    {
        return $this->hasOne(Grupo::className(), ['idgrupo' => 'grupo_idgrupo']);
    }
}
