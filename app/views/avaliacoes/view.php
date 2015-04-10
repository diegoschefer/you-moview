<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\controllers\AvaliacoesController;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$this->title = 'Avaliação para "'.AvaliacoesController::nameMovies($model->fk_idfilmes).'"';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avaliacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacoes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Atualizar'), ['update', 'id' => $model->idavaliacoes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Excluir'), ['delete', 'id' => $model->idavaliacoes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Você tem certeza que quer excluir este registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nota',
            'comentarios:ntext',
            'local',
            'companhia',
            [
                'attribute' => 'data',
                'value' => date('d/m/Y',strtotime($model->data)),
            ],
            [
                'attribute' => 'filme',
                'value' => AvaliacoesController::nameMovies($model->fk_idfilmes),
            ]
        ],
    ]) ?>

</div>
