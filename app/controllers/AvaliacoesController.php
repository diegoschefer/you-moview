<?php

namespace app\controllers;

use Yii;
use app\models\Avaliacoes;
use app\models\AvaliacoesSearch;
use app\models\Filmes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvaliacoesController implements the CRUD actions for Avaliacoes model.
 */
class AvaliacoesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Avaliacoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AvaliacoesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Avaliacoes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Avaliacoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Avaliacoes();
        $model->fk_idfilmes = Yii::$app->request->get("fk_idfilmes");
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idavaliacoes]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'filmes' => self::listMovies(),
            ]);
        }
    }

    /**
     * Updates an existing Avaliacoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idavaliacoes]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'filmes' => self::listMovies(),
            ]);
        }
    }

    /**
     * Deletes an existing Avaliacoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Avaliacoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Avaliacoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Avaliacoes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function listMovies(){
        $query = Filmes::find('idfilmes','nome')->all();
        foreach ($query as $k) {
            $list[$k['idfilmes']] = $k['nome'];
        }
        return $list;
    }
    
    public function nameMovies($id){
        return Filmes::findOne($id)['nome'];
    }
}
