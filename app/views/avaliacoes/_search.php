<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvaliacoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avaliacoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idavaliacoes') ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'comentarios') ?>

    <?= $form->field($model, 'local') ?>

    <?= $form->field($model, 'companhia') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'fk_idfilmes') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
