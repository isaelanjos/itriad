<?php


namespace app\controllers;

use app\models\Transportadora;
use Yii;
use app\models\Produto;
use yii\web\Controller;

class CarrinhoController extends Controller
{

    public function actionIndex() {

        session_start();

        if(!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            return $this->redirect('?r=carrinho/empty');
        }

        foreach($_SESSION['carrinho'] as $id => $qtde){
            //Remove o item do carrinho caso a quantidade seja igual ou menor que 0 (zero)
            if ($qtde <= 0) {
                unset($_SESSION['carrinho'][$id]);
            }

            $lProduto[$id] = Produto::find()->select('id,descricao,modelo,cor,peso,preco,custo_transporte,max_item_palete')->where('id = '.$id.'')->one();

            //Se não existir o ID do Produto, limpamos a sessão e redirecionamos de volta para o Carrinho
            if(!$lProduto[$id]) return $this->redirect('?r=carrinho/clear');
        }

        $lTransportadora = Transportadora::find()->innerjoinWith('transportadoraCustos')->all();
        return $this->render('index', [
            'lProduto' => $lProduto,
            'lTransportadora' => $lTransportadora,
        ]);

    }

    public function actionAdicionar($id,$qtde = 1) {

        session_start();

        $_SESSION['carrinho'][$id] = $qtde;
        return $this->redirect('?r=carrinho');

    }

    public function actionEmpty(){
        return $this->render('empty');
    }

    public function actionClear(){
        session_start();
        $_SESSION['carrinho']=array();
        session_unset($_SESSION['carrinho']);
        session_destroy();

        return $this->redirect('?r=carrinho');
    }

}