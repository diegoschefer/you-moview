<?php

namespace app\controllers;

use Yii;
use app\models\Filmes;
use app\models\FilmesSearch;
use app\models\Generos;
use app\models\FilmesGeneros;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * FilmesController implements the CRUD actions for Filmes model.
 */
class FilmesController extends Controller
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
     * Lists all Filmes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Filmes model.
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
     * Creates a new Filmes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model   = new Filmes();
        

        if ($model->load(Yii::$app->request->post())) {
            
            $model->imagem = UploadedFile::getInstance($model, 'imagem');
            if ($model->imagem && $model->validate()) {                
                $img_name = md5(microtime()).'.'.$model->imagem->extension;
                $model->imagem->saveAs('uploads/'.$img_name);
                $model->imagem = $img_name;
            }
            $model->save();
            if(is_array($model->filmesGeneros)){
                foreach(Yii::$app->request->post()['Filmes']['filmesGeneros'] as $genero){
                    $generos = new FilmesGeneros();
                    $generos->fk_idgereros = $genero;
                    $generos->fk_idfilmes  = $model->idfilmes;
                    $generos->save();    
                }    
            }
            return $this->redirect(['view', 'id' => $model->idfilmes]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'generos' => self::listGender(),
            ]);
        }
    }

    /**
     * Updates an existing Filmes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(!empty(UploadedFile::getInstance($model, 'imagem')->name)){
                $model->imagem = UploadedFile::getInstance($model, 'imagem');
                if ($model->imagem && $model->validate()) {                
                    $img_name = md5(microtime()).'.'.$model->imagem->extension;
                    $model->imagem->saveAs('uploads/'.$img_name);
                    $model->imagem = $img_name;
                }
            }else{
                unset($model->imagem);
            }
            
            
            
            $model->save();
            if(is_array($model->filmesGeneros)){
                foreach(Yii::$app->request->post()['Filmes']['filmesGeneros'] as $genero){
                    $generos = new FilmesGeneros();
                    $generos->fk_idgereros = $genero;
                    $generos->fk_idfilmes  = $model->idfilmes;
                    $generos->save();    
                }    
            }
            
            return $this->redirect(['view', 'id' => $model->idfilmes]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'generos' => self::listGender(),
            ]);
        }
    }

    /**
     * Deletes an existing Filmes model.
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
     * Finds the Filmes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filmes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filmes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function listGender(){
        $query = Generos::find('idgeneros','nome')->all();
        foreach ($query as $k) {
            $list[$k['idgeneros']] = $k['nome'];
        }
        return $list;
    }
}