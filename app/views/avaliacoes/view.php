<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$this->title = $model->idavaliacoes;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avaliacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacoes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idavaliacoes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idavaliacoes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idavaliacoes',
            'nota',
            'comentarios:ntext',
            'local',
            'companhia',
            'data',
            'fk_idfilmes',
        ],
    ]) ?>

</div>
