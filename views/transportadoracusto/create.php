<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransportadoraCusto */

$this->title = 'Cadastrar Custo da Transportadora';
$this->params['breadcrumbs'][] = ['label' => 'Transportadora Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportadora-custo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
