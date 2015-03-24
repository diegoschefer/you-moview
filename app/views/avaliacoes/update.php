<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$this->title = Yii::t('app', 'Atualizar avaliação: ', [
    'modelClass' => 'Avaliacoes',
]) . ' ' . $model->idavaliacoes;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avaliacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idavaliacoes, 'url' => ['view', 'id' => $model->idavaliacoes]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="avaliacoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'filmes' => $filmes,
    ]) ?>

</div>
