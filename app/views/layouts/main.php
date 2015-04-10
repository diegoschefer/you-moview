<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'you-MoView',
                'brandUrl' => '#',
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Filmes', 'url' => ['/filmes/']],
                    ['label' => 'Avaliações', 'url' => ['/avaliacoes']],
                    ['label' => 'Gêneros', 'url' => ['/generos']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; you-MoView <?= date('Y') ?></p>
            <p class="pull-right"></p>
        </div>
    </footer>
<?php $this->endBody() ?>
<script>
$(document).ready(function(){
    $("#avaliacoes-data").datepicker("destroy");
    $("#avaliacoes-data").datepicker({maxDate:'0'});
    $("#avaliacoes-data").datepicker("refresh");
});
</script>
</body>
</html>
<?php $this->endPage() ?>
