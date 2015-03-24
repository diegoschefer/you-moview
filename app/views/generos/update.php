<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generos */

$this->title = Yii::t('app', 'Atualizar gênero: ', [
    'modelClass' => 'Generos',
]) . ' ' . $model->idgeneros;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idgeneros, 'url' => ['view', 'id' => $model->idgeneros]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="generos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
