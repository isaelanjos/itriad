<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\grid\GridView;

$this->title = Yii::$app->params['titleGeneric'];

//Corrigir!
//Colocar no Model
$custo_total    = 0;
$peso_total     = 0;
$palete_total   = 0;
$qtde_total     = 0;

?>
<div class="site-index">

    <div class="body-content">

        <h1>Meu Carrinho</h1>

        <div class="alert alert-info">
            <p>A quantidade de paletes é calculada automaticamente com base na quantidade máxima de aparelhos por palete, esse valor pode ser alterado no CRUD de Produtos</p>
        </div>
        <table class="table table-striped table-bordered" style="background-color: #dde">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Peso</th>
                <th>Preço</th>
                <th>Transporte por Aparelho</th>
                <th>Qdte</th>
                <th>Paletes</th>
                <th>Peso Total</th>
                <th>Transporte Total</th>
            </tr>
            </thead>


            <?php
            foreach($_SESSION['carrinho'] as $id => $qtde) {
                ?>

                <tbody>
                <tr>
                    <td><?=$lProduto[$id]['descricao'];?></td>
                    <td><?=$lProduto[$id]['modelo'];?></td>
                    <td><?=$lProduto[$id]['cor'];?></td>
                    <td><?=$lProduto[$id]['peso'];?> g</td>
                    <td><?= 'R$' . number_format($lProduto[$id]['preco'], 2, ',', '.');?></td>
                    <td><?= 'R$' . number_format($lProduto[$id]['custo_transporte'], 2, ',', '.');?></td>
                    <td>
                        <form method="get" action="index.php">
                            <input type="hidden" value="carrinho/adicionar" name="r" />
                            <input type="hidden" value="<?=$id;?>" name="id" />
                            <input type="number" value="<?=$qtde;?>" name="qtde" style="width: 75px;">
                            <input type="submit" value="OK" class="btn btn-primary" style="width: 50px;">
                        </form>

                    </td>

                    <td><?=ceil($qtde/$lProduto[$id]['max_item_palete']);?></td>
                    <td><?=number_format(($lProduto[$id]['peso']*$qtde)/1000, 3, ',', ' ');?> Kg</td>
                    <td><?= 'R$' . number_format($lProduto[$id]['custo_transporte']*$qtde, 2, ',', '.');?></td>

                </tr>
                </tbody>

                <?php
                $qtde_total = $qtde_total + $qtde;
                $custo_total = $custo_total + ($lProduto[$id]['custo_transporte']*$qtde);
                $peso_total = $peso_total + ($lProduto[$id]['peso']*$qtde);
                $palete_total = $palete_total + ceil($qtde/$lProduto[$id]['max_item_palete']);

            }
            ?>
            <tr>
                <td colspan="9">&nbsp;</td>
                <td><h4><b><?= 'R$' . number_format($custo_total, 2, ',', '.');?></b></h4></td>
            </tr>
        </table>
        <div class="alert alert-warning">
            <p>Para remover um Item basta zerar a quantidade de Produtos</p>
        </div>


        <h2>Transportadoras Disponíveis:</h2>
        <div class="alert alert-info">
            <p>Serão exibidas somente as transportadoras que possuem custo do transporte(ar, mar e terra) cadastrados. Devido ao fato de ter sido solicitado que tivesse um CRUD de custo do transporte por transportadora. A transportadora pode ser cadastrada sem ser necessário inserir o custo do transporte(ar, mar e terra)</p>
        </div>
        <table class="table table-striped table-bordered" style="background-color: #dde">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Transportadora</th>
                <th>Cidade</th>
                <th>Custo Aéreo</th>
                <th>Custo Terrestre</th>
                <th>Custo Marítimo</th>
                <th>Custo por Quilo</th>
                <th>Custo por Palete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($lTransportadora as $key => $value) {
                ?>
                <tr>
                    <td><input type="radio" name="radio_transportadora" id="radio_transportadora" value="<?=$value['id'];?>" <?php if($value['id'] == 1){ echo "checked";} ?>></td>
                    <td><?=$value['nome'];?></td>
                    <td><?=$value['cidade'];?></td>
                    <td id="custo_ar[<?=$value['id'];?>]"><?=$value['transportadoraCustos'][0]['custo_ar'];?></td>
                    <td id="custo_terra[<?=$value['id'];?>]"><?=$value['transportadoraCustos'][0]['custo_terra'];?></td>
                    <td id="custo_agua[<?=$value['id'];?>]"><?=$value['transportadoraCustos'][0]['custo_agua'];?></td>
                    <td id="custo_quilo[<?=$value['id'];?>]"><?=$value['transportadoraCustos'][0]['custo_quilo'];?></td>
                    <td id="custo_palete[<?=$value['id'];?>]"><?=$value['transportadoraCustos'][0]['custo_palete'];?></td>

                </tr>
                <?php
            } ?>
            </tbody>
        </table>

        <h4>Meio de Transporte:</h4>
        <select class="form-control" name="meio" id="meio">
            <option value="custo_ar">Transporte Aéreo</option>
            <option value="custo_terra">Transporte Terrestre</option>
            <option value="custo_agua">Transporte Marítimo</option>
        </select>
        <div style="margin-top: 20px;" align="center">
            <button type="button" class="btn btn-danger" style="font-size: 18px; font-weight: bold; width: 400px;" onclick="calcularFrete()">Calcular Frete</button>
        </div>
        <hr>
        <h2>Resumo do Pedido</h2>
        <table class="table table-striped table-bordered" style="background-color: #dde">
            <thead>
            <tr>
                <th>Total de Itens</th>
                <th>Peso Total</th>
                <th>Total de Paletes</th>
                <th>Custo de Transporte do Aparelho</th>
                <th>Custo Final do Frete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?=$qtde_total;?> aparelhos</td>
                <td><?=number_format(($peso_total)/1000, 3, ',', ' ');?> Kg</td>
                <td><?=$palete_total;?></td>
                <td><?= 'R$' . number_format($custo_total, 2, ',', '.');?></td>
                <td id="custo_total_transporte"></td>
            </tr>
            </tbody>
        </table>
        <p>
            O Sistema tem 3 calculos que podem ser levados em consideração:<br />
            1 - Calculo comum <i>Qtde de Aparelhos</i>*<i>Custo de Transporte do Aparelho</i>*<i>Custo de Transporte da Transportadora</i> que gera o <b>Custo Final do Frete</b> exibido na tabela acima.<br />
            2 - O <b>Diferencial</b> citado no e-mail, para calcular o frete que será transportado pelo ar, que utiliza <i>Peso</i>*<i>Custo de Transporte da Transportadora</i><br />
            3 - O <b>Diferencial</b> citado no e-mail, para calcular o frete que será transportado por terra e/ou mar, que utiliza <i>Quantidade de Paletes</i>*<i>Custo de Transporte da Transportadora</i><br />
        </p>
<div class="alert alert-info" id="aviso" style="font-size: 14px; font-weight: bold;" hidden></div>
<div align="right"><h1 style="font-weight: bold">Total: <span id="total_final"></span></h1></div>
    </div>

</div>

<script type="text/javascript">
    function calcularFrete(){

        var radio = document.getElementsByName("radio_transportadora");
        for(var i = 0; i < radio.length; i++) {
            if (radio[i].checked) {
               var frete_transportadora = radio[i].value;
            }
        }

        var frete_meio_transporte = document.getElementById("meio").value;

        var frete_custo_transportadora = document.getElementById(""+frete_meio_transporte+"["+frete_transportadora+"]").innerText;

        document.getElementById("custo_total_transporte").innerText = "R$ " + (frete_custo_transportadora*<?=$custo_total;?>).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");

        if (frete_meio_transporte == 'custo_ar') {
            document.getElementById("aviso").style.display = 'block';
            document.getElementById("aviso").innerText = "Você selecionou o meio de transporte Aéreo o Total será baseado no (Peso*Custo da Transportadora por Quilo)";
            document.getElementById("total_final").innerText = "R$ " + (frete_custo_transportadora*<?=$peso_total/1000;?>).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");

        }

        if (frete_meio_transporte == 'custo_terra' || frete_meio_transporte == 'custo_agua') {
            document.getElementById("aviso").style.display = 'block';
            document.getElementById("aviso").innerText = "Você selecionou o meio de transporte Terrestre ou Marítimo o Total será baseado no (Quantidade de Paletes*Custo da Transportadora por Palete)";
            document.getElementById("total_final").innerText = "R$ " + (document.getElementById("custo_palete["+frete_transportadora+"]").innerText*<?=$palete_total;?>).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");

        }



    }
</script>
