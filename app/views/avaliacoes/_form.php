<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avaliacoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avaliacoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_idfilmes')->dropDownList($filmes,['prompt' => 'Selecione um filme']) ?>
    
    <?= $form->field($model, 'nota')->radioList([0,1,2,3,4,5]) ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6, 'maxlength' => 144]) ?>

    <?= $form->field($model, 'local')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'companhia')->textInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::classname(),['language' => 'pt','dateFormat' => 'yyyy-MM-dd','options' => ['minDate' => 'dateToday']])->textInput(['readonly' => 'readonly']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Inserir') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
