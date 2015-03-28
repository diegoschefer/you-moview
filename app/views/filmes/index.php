<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FilmesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Filmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filmes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?= Html::a('Inserir filme', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'imagem', 'format' => 'html', 'value' => function($data){ return Html::img($data->imageurl, ['width'=>'100']); }],
            'nome',
            'ano',
            'pais',
            ['attribute' => 'status', 'format' => 'text', 'value' => function($data){ return $data->status ? 'Assistido' : 'Pendente'; } ],
            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>

</div>
