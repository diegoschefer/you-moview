<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FilmesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filmes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfilmes') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'pais') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'status') ? 'Assistido' : 'Pendente'; ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
