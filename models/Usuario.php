<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property string $nome
 * @property int $idusuario
 * @property string $email
 * @property string $senha
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Campeonato[] $campeonatos
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $senha_repete;
    
    public function afterSave($insert,$changedAttributed){
        $auth = Yii::$app->authManager;
        //remove todas as permissões do usuario
        if (!$insert) {
            $auth->revokeAll($this->getId());
        }
        //busca o papel escolhido para o usuario
        $papel = $auth->getRole($this->tipo);
        //realiza a associação entre o usuario e o papel
        $auth->assign($papel,$this->getId());
        parent::afterSave($insert,$changedAttributed);    
    }
    
    public function afterDelete(){
        Yii::$app->authManager->revokeAll($this->getId());
        parent::afterDelete();

    }

    public static function findIdentity($idusuario)
    {
        return self::findOne($idusuario);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->idusuario;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function findByEmail($email){
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($senha){
        //return ($this->senha === $senha);
        return ($this->senha === sha1($senha));
    }

    public function beforeSave($insert)
    {
    if (!parent::beforeSave($insert)) {
        return false;
    }
    if($insert) {
            $this->access_token = Yii::$app->security->generateRandomString(82);
            $this->auth_key = Yii::$app->security->generateRandomString(45);
        }
    if(isset($this->dirtyAttributes['senha'])){
            $this->senha = sha1($this->senha);
        }
    return true;
    }

    public static function tableName()
    {
        return 'usuario';
    }

    public static function getTypes(){
        return [
            'admin'=>Yii::t('app','Admin'),
            'usuario'=>Yii::t('app','User'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        [['nome', 'email','senha','senha_repete'], 'required'],
        [['nome', 'email', 'senha', 'auth_key'], 'string', 'max' => 45],
        [['access_token'], 'string', 'max' => 82],
        [['senha_repete'], 'compare', 'compareAttribute' => 'senha'],
        [['email'], 'unique'],
        [['email'],'email'],
        [['tipo'],'in','range'=>['admin','usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
        'nome' => Yii::t('app', 'Nome'),
        'idusuario' => Yii::t('app', 'Idusuario'),
        'email' => Yii::t('app', 'Email'),
        'senha' => Yii::t('app', 'Senha'),
        'auth_key' => Yii::t('app', 'Auth Key'),
        'access_token' => Yii::t('app', 'Access Token'),
        'senha_repete' => Yii::t('app', 'Confirmar Senha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampeonatos()
    {
        return $this->hasMany(Campeonato::className(), ['usuario_idusuario' => 'idusuario']);
    }
}
