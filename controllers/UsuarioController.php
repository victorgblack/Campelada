<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use app\models\Campeonato;
use app\models\CampeonatoSearch;
use app\models\Equipe;
use app\models\EquipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
             'class' => AccessControl::className(),
               //'only' => ['login', 'logout', 'signup'],
             'rules' => [
                 [
                     'allow' => true,
                     'actions' => ['settings','index','view','incial','delete','update'],
                     'roles' => ['@'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['create'],
                     'roles' => ['?'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['inicial'],
                     'roles' => ['usuarioInicial'],
                 ],
                  /*[
                     'allow' => true,
                     'actions' => ['update'],
                     'roles' => ['usuarioUpdate'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['delete'],
                     'roles' => ['usuarioDelete'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['inicial'],
                     'roles' => ['usuarioInicial'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['settings'],
                     'roles' => ['usuarioSettings'],
                 ],
                 [
                     'allow' => true,
                     'actions' => ['view'],
                     'roles' => ['usuarioView'],
                 ],
                [
                     'allow' => true,
                     'actions' => ['index'],
                     'roles' => ['adminIndex'],
                ], */ 
             ],
         ],
     ];
 }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $campeonatos = CampeonatoSearch::listByUser(Yii::$app->user->getId());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'campeonatos'=>$campeonatos
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionInicial(){
        $query = Campeonato::find()->where(['usuario_idusuario'=>Yii::$app->user->identity->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $model = new Equipe();

        return $this->render('inicial',[
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionSettings(){
        return $this->render('settings');
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout="autenticacao";
        $model = new Usuario();
        $model->tipo = 'usuario';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inicial']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->tipo = 'usuario'; //colocar no controlador do usuario

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idusuario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
