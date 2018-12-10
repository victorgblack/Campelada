<?php

namespace app\controllers;

use Yii;
use app\models\Campeonato;
use app\models\CampeonatoSearch;
use app\models\EquipeSearch;
use app\models\Equipe;
use app\models\Grupo;
use app\models\EquipeGrupo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * CampeonatoController implements the CRUD actions for Campeonato model.
 */
class CampeonatoController extends Controller
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
                       'actions' => ['create', 'update', 'delete','principal'],
                       'roles' => ['@'],
                   ],
                   [
                       'allow' => true,
                       'actions' => ['index', 'view'],
                       'roles' => ['@', '?'],
                   ],
               ],
           ],
        ];
    }

    /**
     * Lists all Campeonato models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampeonatoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $campeonatos = CampeonatoSearch::listByUser(Yii::$app->user->getId());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'campeonatos' => $campeonatos,
        ]);
    }

    public function actionPrincipal($id)
    {
        
        $searchModel = new Equipe();
        $grupos = Grupo::find('idgrupo')->where(['campeonato_idcampeonato' => $id])->all();
        $equipesgrupos = EquipeGrupo::find('equipe_idequipe')->where(['grupo_idgrupo']->$grupos)->all();
        $equipes = Equipe::find()->where(['idequipe'=>$equipesgrupos])->all();
        $dataProvider = new ActiveDataProvider([
            'equipes' => $equipes,
        ]);

        return $this->render('principal', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'equipes' => $equipes,
        ]);
    }

    /**
     * Displays a single Campeonato model.
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

    /**
     * Creates a new Campeonato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campeonato();
        $equipes2 = Equipe::find()->all();
        $model->usuario_idusuario = \Yii::$app->user->identity->idusuario;
        $grupo='grupo';
        $idEquipes = Yii::$app->request->get('id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (shuffle($idEquipes)) {
                for ($i=1; $i <= $model->$qtdGrupo ; $i++) { 
                    $this->criaGrupos($model);
                    for ($j=0; $j < $model->$qtdEquipeGrupo ; $j++) { 
                        $this->recebeEquipes($idEquipes,$grupo.$i);
                    }
                }     
            }         
            return $this->redirect(['view', 'id' => $model->idcampeonato]);
        }

        $equipes = EquipeSearch::listAll();

        return $this->render('create', [
            'model' => $model,
            'equipes'=>$equipes,
            'equipes2'=>$equipes2,
            'formatos'=>Campeonato::$formatos   
        ]);
    }

    protected function criaGrupos($model){
        for ($i=1 ; $i <= $model->qtdGrupo  ; $i++ ) { 
                $g= new Grupo();
                $g->nome= $grupo.$i;
                $g->campeonato_idcampeonato = $model->idcampeonato;
                $g->save();
            }
    }

    protected function recebeEquipes($listaEquipes,$grupo){
        if (is_array($listaEquipes)) {
            try {
                foreach ($listaEquipes as $id) {
                    $m = new EquipeGrupo();
                    $m->equipe_idequipe = $id;
                    $m->grupo_idgrupo = $grupo->idgrupo;
                    $m->save();
                }

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return true;
    }

    /**
     * Updates an existing Campeonato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcampeonato]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Campeonato model.
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
     * Finds the Campeonato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campeonato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campeonato::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
