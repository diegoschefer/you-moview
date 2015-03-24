<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvaliacoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Avaliações');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacoes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Inserir avaliação'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'fk_idfilmes', 'value' => 'filmes.nome'],
            'nota',
            'comentarios:ntext',
            'local',
            'companhia',
            ['attribute' => 'data', 'value' => function($data){ return date('d/m/Y', strtotime( $data->data ) ); } ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
