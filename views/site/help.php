<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Instruções de Uso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <h3>Instruções para o uso do Sistema:</h3>
        <ul>
			<li>Não é necessário está logado para fazer orçamentos</li>
			<li>Os orçamentos são salvos em sessões</li>
        </ul>
    </p>

</div>
