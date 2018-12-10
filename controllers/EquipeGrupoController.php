<?php

namespace app\controllers;

use Yii;
use app\models\EquipeGrupo;
use app\models\EquipeGrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquipeGrupoController implements the CRUD actions for EquipeGrupo model.
 */
class EquipeGrupoController extends Controller
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
     * Lists all EquipeGrupo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipeGrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EquipeGrupo model.
     * @param string $equipe_nome
     * @param integer $grupo_idgrupo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($equipe_nome, $grupo_idgrupo)
    {
        return $this->render('view', [
            'model' => $this->findModel($equipe_idequipe, $grupo_idgrupo),
        ]);
    }

    /**
     * Creates a new EquipeGrupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EquipeGrupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipe_idequipe' => $model->equipe_idequipe, 'grupo_idgrupo' => $model->grupo_idgrupo]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EquipeGrupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $equipe_nome
     * @param integer $grupo_idgrupo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($equipe_idequipe, $grupo_idgrupo)
    {
        $model = $this->findModel($equipe_idequipe, $grupo_idgrupo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipe_nome' => $model->equipe_idequipe, 'grupo_idgrupo' => $model->grupo_idgrupo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EquipeGrupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $equipe_nome
     * @param integer $grupo_idgrupo
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($equipe_idequipe, $grupo_idgrupo)
    {
        $this->findModel($equipe_idequipe, $grupo_idgrupo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EquipeGrupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $equipe_nome
     * @param integer $grupo_idgrupo
     * @return EquipeGrupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($equipe_idequipe, $grupo_idgrupo)
    {
        if (($model = EquipeGrupo::findOne(['equipe_idequipe' => $equipe_idequipe, 'grupo_idgrupo' => $grupo_idgrupo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
