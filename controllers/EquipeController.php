<?php

namespace app\controllers;

use Yii;
use app\models\Equipe;
use app\models\Jogador;
use app\models\EquipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquipeController implements the CRUD actions for Equipe model.
 */
class EquipeController extends Controller
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
        ];
    }

    /**
     * Lists all Equipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipe model.
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
     * Creates a new Equipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($partial = false)
    {
        $model = new Equipe();
        $nomesJogadores = Yii::$app->request->post('nomeJogador');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($this->salvarJogadores($model,$nomesJogadores)) {
                return $this->redirect(['view', 'id' => $model->idequipe]);
            }
        }

        if ($partial) {
            $this->layout = 'modal';
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function salvarJogadores($equipe,$listaJogadores) {
        if (is_array($listaJogadores)) {
            try {
                foreach ($listaJogadores as $nome) {
                    $m = new Jogador();
                    $m->nome = $nome;
                    $m->equipe_idequipe = $equipe->idequipe;
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
     * Updates an existing Equipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $lista = Jogador::find()->where(['equipe_nome'=>$model->nome])->all();

        $listaFiltrada = array_map(function($jogador) {
            return ['id'=>null,'nome'=>$jogador->nome];
        },$lista);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idequipe]);
        }

        return $this->render('update', [
            'model' => $model,
            'listaJogadores'=>$listaFiltrada
        ]);
    }

    /**
     * Deletes an existing Equipe model.
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
     * Finds the Equipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
