<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Filmes */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Filmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filmes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idfilmes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->idfilmes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que quer excluir este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' =>'imagem',
                'value'     => !empty($model->imagem) ? '../uploads/'.$model->imagem : 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xpt1/v/t34.0-12/11075726_817902481635971_1116253616_n.jpg?oh=33235612b967e30612df9e60bf585dd1&oe=55182BF1&__gda__=1427650754_809402110b65a4695bcafba0699521d6',
                'format'    => ['image',['height'=>'100']],
            ],
            'nome',
            'ano',
            'pais',
        ],
    ]);
    ?>
    
    <?php
        echo count($model->avaliacoes) > 0 ? '<h3>Avaliações deste filme</h3>' : '';
        
        foreach($model->avaliacoes as $item){
            echo '<table class="table table-striped table-bordered detail-view">';
                echo '<tr>';
                    echo '<th>Data:</th><td>',date('d/m/Y',strtotime($item->data)),'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Nota:</th><td>',$item->nota,'</td>';
                    echo '</tr>';
                echo '<tr>';
                    echo '<th>Local:</th><td>',$item->local,'</td>';
                    echo '</tr>';
                echo '<tr>';
                    echo '<th>Companhia:</th><td>',$item->companhia,'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Comentários:</th><td>',$item->comentarios,'</td>';
                echo '</tr>';
            echo '</table>';
        }
        
    ?>

</div>
