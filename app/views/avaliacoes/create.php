<?php

use yii\helpers\Html;
use app\controllers\AvaliacoesController;


/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$filme = @$_GET['filme'] ? AvaliacoesController::nameMovies($_GET['filme']) : '';
$leg   =  @$_GET['filme'] ? ' para "'.$filme.'"' : '';

$this->title = Yii::t('app', 'Inserir avaliacão').$leg;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avaliacoes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avaliacoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'filmes' => $filmes,
    ]) ?>

</div>
