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
            <li>O Projeto foi desenvolvido em Yii2, grande parte dele foi utilizado mais JS e PHP puro, o Yii2 ficou mais como base, e serviu para agilizar o desenvolvimento.</li>

            <li>Os arquivo de configurações estão em ./projeto/config/ Se for o caso colocar pra rodar o projeto local, deve-se alterar o arquivo db.php e colocar as configurações locais (mysql).</li>

            <li>O entendimento que eu tive foi de que seria necessário o usuário selecionar itens(produtos/aparelhos) para que enviasse através da transportadora. Porém a pouco tempo tive o entendimento de que ná verdade estava sendo pedido apenas um grid contendo todos os aparelhos e no mesmo grid os calculos de quanto seria o frete. De forma que está atendendo a solicitação.</li>

            <li>O “Orçamento” ou “Carrinho” está sendo salvo utilizando sessão, e os calculos feitos em JS e PHP.</li>

            <li>Os cálculos da parte "Bonus" da prova deixa o calculo anterior obsoleto, então deixei na tela de "carrinho" os dois valores, tanto o calculo comum, quanto o "Bonus".</li>

            <li>O projeto tem 3 áreas, Listagem de Produtos, Carrinho(ou Orçamento) e Administração. Sendo que na Administração é possível manter os cadastros de Produtos, Transportadoras e Custos das Transportadoras.</li>

            <ul>
                <li>Listagem de Produtos: É exibido um grid com os Produtos cadadastrados, e um action para adicionar o produto selecionado no "carrinho" ou "orçamento". De forma que fica flexível, podendo o usuário ver somente o "orçamento" dos produtos que ele quer enviar naquele momento.</li>
                <li>"Carrinho" ou "Orçamento": É exibido toda a informação principal do projeto, dados do frete, resumo, produtos selecionados, é permitido alterar a quantidade de produtos. Está calculando com base no "Diferencial" solicitado no e-mail:</li>
                - Para os meios de transporte mar e terra cada transportadora tem um custo por palete;
                <br />- Para o meio de transporte ar a transportadora cobra o valor por quilo transportado;
                <li>Administração: É onde estão todos os CRUDS do projeto de forma simples.</li>
            </ul>

            <li>Já existem Produtos, Transportadoras e Custos das Transportadoras cadastrados por padrão. Para verificar o funcionamento do projeto, devemos:
                <ul>
                    <li>Ter produtos cadastrados</li>
                    <li>Ter transportadoras cadastradas</li>
                    <li>Ter custos das transportadoras cadastradas</li>
                    <li>No menu “Produtos” escolha o produto desejado e clique em “Adicionar”, esse produto agora está no seu “Carrinho”, como se fosse um “Carrinho de Compras”</li>
                    <li>No menu “Carrinho” você poderá ver todo o funcionamento do sistema para gerar o Valor Final do Frete.</li>
                </ul>
        </ul>
    </p>

</div>
