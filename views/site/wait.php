<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = 'SGCP';
?>
<div class="site-index">

    <div class="body-content" align="center">
        <?= Html::img('img/manual.png');?>
        <h1>Conteúdo indisponível no momento</h1>
        <h6><?=Yii::$app->params['adminName'].' - '.Yii::$app->params['telefone']?></h6>
    </div>

</div>
