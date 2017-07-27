<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = Yii::$app->params['titleGeneric'];
?>
<div class="site-index">

    <div class="body-content">
        <h1><?=Yii::$app->params['projectAbrv']?></h1>
        <h3><?=Yii::$app->params['projectName']?></h3>
        <h4><?=Yii::$app->params['versionText']?></h4>
        <h4><?=Yii::$app->params['projectText']?></h4>
        <h4>Desenvolvido pela <?=Yii::$app->params['adminName']?></h4>
        <h4>Desenvolvedores: <?=Yii::$app->params['developper']?></h4>
        <h4>Atualizado em <?=Yii::$app->params['lastUpdate']?></h4>
        <h4>Versão utilizada: <?=Yii::$app->params['version']?> | Ultima Versão: <?=Yii::$app->params['lastVersion']?></h4>
        <?= Html::img('img/linux-apache-mysql-php-yii2-git.png');?>
    </div>

</div>
