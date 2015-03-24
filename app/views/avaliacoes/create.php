<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */

$this->title = Yii::t('app', 'Inserir avaliacão');
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
