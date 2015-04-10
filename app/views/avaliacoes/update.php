<?php

use yii\helpers\Html;
use app\controllers\AvaliacoesController;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$filme = AvaliacoesController::nameMovies($model->fk_idfilmes);
$leg   = ' para "'.$filme.'"';

$this->title = Yii::t('app', 'Atualizar avaliação', [
    'modelClass' => 'Avaliacoes',
]) . $leg;
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
