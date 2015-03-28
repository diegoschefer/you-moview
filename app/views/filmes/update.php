<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Filmes */

$this->title = 'Atualizar filme: ' . ' ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Filmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->idfilmes]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="filmes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'generos' => $generos,
    ]) ?>

</div>
