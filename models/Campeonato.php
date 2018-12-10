<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campeonato".
 *
 * @property int $idcampeonato
 * @property string $nome
 * @property string $modalidade
 * @property string $formato
 * @property int $usuario_idusuario
 * @property int $qtdEquipe
 * @property int $qtdGrupo
 * @property string $qtdEquipeGrupo
 *
 * @property Usuario $usuarioIdusuario
 * @property Grupo[] $grupos
 */
class Campeonato extends \yii\db\ActiveRecord
{

    public static $formatos = [
        'pontosCorridos' => 'Pontos corridos',
        'eliminatorias' => 'Eliminatórias',
        'grupoeeliminatoria' => 'Fase de Grupos e Eliminatórias'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'campeonato';
    }

    public function beforeSave($insert){

        if($this->formato != 'grupoeeliminatoria'){
            $this->qtdGrupo = '1';
        }

        $this->qtdEquipeGrupo = $this->qtdEquipe / $this->qtdGrupo;

        /*
        $equipeRandom = array('' => , );
        shuffle($equipeRandom);
        sort($equipeRandom)->rand();
        for($i=0;$i<$this->qtdEquipeGrupo;$i++){
            if($equipeRandom[1].){
    
            }
        }

        */

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'formato', 'usuario_idusuario', 'qtdEquipe'], 'required'],
            [['usuario_idusuario', 'qtdEquipe', 'qtdGrupo','qtdEquipeGrupo'], 'integer'],
            [['nome', 'modalidade', 'formato'], 'string', 'max' => 45],
            [['usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_idusuario' => 'idusuario']],
            [['qtdGrupo'],'compare','compareValue' =>2, 'operator'=> '>='],
            ['qtdGrupo', function ($attribute, $params, $validator){
                if($this->$attribute > $this->qtdEquipe){
                    $this->addError($attribute, Yii::t('app','Groups will be less than Teams'));
                }

                if(($this->qtdEquipe % $this->$attribute) != 0){
                    $this->addError($attribute,Yii::t('app','Groups will be divisible by Teams number'));
                }    
            }

            ],
            //['qtdEquipeGrupo','compare','compareValue'=>intval('qtdEquipe')/intval('qtdGrupo'),'operator'=>'<'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcampeonato' => Yii::t('app', 'Idcampeonato'),
            'nome' => Yii::t('app', 'Nome'),
            'modalidade' => Yii::t('app', 'Modalidade'),
            'formato' => Yii::t('app', 'Formato'),
            'usuario_idusuario' => Yii::t('app', 'Usuario Idusuario'),
            'qtdEquipe' => Yii::t('app', 'Qtd Equipe'),
            'qtdGrupo' => Yii::t('app', 'Qtd Grupo'),
            'qtdEquipeGrupo' => Yii::t('app', 'Qtd Equipe Grupo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['campeonato_idcampeonato' => 'idcampeonato']);
    }

    public function getCampeonatoGp(){
        return CampeonatoSearch::campeonatoGp($this->idcampeonato);
    }

    public function getUsusarioId(){
        return $this->usuario_idusuario;
    }
}
