<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Filmes */
/* @var $form yii\widgets\ActiveForm */


$model->filmesGeneros = $model->filmesGenerosList;
?>

<div class="filmes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'filmesGeneros')->checkBoxList($generos,['prompt' => 'Selecione os generos'])->label('Gêneros'); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ano')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList(
            [1 => 'Assistido', 0 => 'Pendente']
        ); 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Inserir' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
